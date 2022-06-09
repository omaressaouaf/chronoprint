<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\CartItem;
use App\Services\CartService;
use App\Traits\WithLivewireFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PriceCalculator extends Component
{
    use WithLivewireFileUploads, AuthorizesRequests;

    public Product $product;

    /**
     * the user selected options
     * ex : [
     *  "size" => [
     *      'width' => 2,
     *      'height' => 2
     *  ],
     *  "material" => [
     *      'ref' => "optionRef"
     *   ]
     * ]
     * @var Collection
     */
    public Collection $selectedOptions;

    /**
     * The selected options required files
     *  ex : [
     *   "recto-verso" => ["livewirefile1" ,  "livewirefile2"],
     *   "verso" => ["livewirefile1"]
     * ]
     * @var array
     */
    public array $requiredFiles = [];

    public int|string $selectedQuantityValue;

    public array|null $quantity;

    public bool $designByCompany = false;

    public string $designInformation = "";

    public $designFiles = [];

    public float $unitPrice;

    public float $totalPrice;

    /**
     * In case of edit mode we need the following properties
     */
    public bool $editMode = false;

    public CartItem $cartItem;

    public Collection $oldMedia;

    public array $oldMediaIdsToDelete = [];


    protected function rules()
    {
        $fileRules = ["file", "max:10240", "mimes:jpg,jpeg,png,gif,eps,ai,svg,pdf,zip,tar,rar,cdr,psd"];

        return [
            'selectedOptions' => 'nullable',
            "quantity" => "required|array",
            'designByCompany' => "required|boolean",
            "totalPrice" => "required|numeric|min:1",
            "requiredFiles.*" => ["nullable", $fileRules],
            "designFiles.*" => ["nullable", $fileRules]
        ];
    }

    public function render()
    {
        return view('livewire.products.price-calculator');
    }

    public function mount()
    {
        $cartItem = auth()->check() ? CartService::getAuthUserCart()->items()->find(request("cartItemId")) :  null;

        /**Check if we are in edit mode */
        if ($cartItem) {
            $this->editMode = true;
            $this->cartItem = $cartItem;
            $this->oldMedia = $cartItem->media;
            $this->selectedOptions = $cartItem->selected_options;
            $this->selectedQuantityValue = $cartItem->quantity;
            $this->designByCompany = $cartItem->design_by_company;
            $this->designInformation = $cartItem->design_information;
        } else {
            $this->oldMedia = collect([]);
            $this->selectedOptions = collect([]);
            $this->product->attributs->each(function ($attribute) {
                $option = [];

                if ($attribute->options_type === 'fixed') {
                    $option["ref"] = $attribute->pivot->options[0]["ref"];
                } else {
                    if (is_array($attribute->groups) && count($attribute->groups)) {
                        foreach ($attribute->groups as $group) {
                            $option["value"][$group['name']] = is_numeric($group['maxLimit'])
                                ? $group['maxLimit']
                                : $attribute->pivot->options[0]["maxValue"];
                        }
                    } else {
                        $option["value"] = $attribute->pivot->options[0]["maxValue"];
                    }
                }

                $this->selectedOptions->put($attribute->name, $option);
            });
            $this->resetSelectedQuantityValue();
            $this->designByCompany = $this->product->category?->is_graphic_service ?? false;
        }

        $this->calculatePrices();

        $this->findAndSetRequiredFiles();
    }

    public function updatedSelectedOptions()
    {
        $this->calculatePrices();

        $this->findAndSetRequiredFiles();
    }

    public function updatedSelectedQuantityValue()
    {
        $this->calculatePrices();
    }

    public function updatedDesignByCompany()
    {
        $this->calculatePrices();
    }

    public function updatedRequiredFiles($newFile, $requiredFileName)
    {
        if ($this->editMode) {
            $mediaItem = $this->oldMedia->where("name", $requiredFileName)->first();

            if ($mediaItem) {
                $this->deleteOldMediaItemLocally($mediaItem->id);
            }
        }
    }

    /**
     * Reset selected quantity value accordingly
     *
     * @return void
     */
    private function resetSelectedQuantityValue(): void
    {
        $this->selectedQuantityValue = $this->product->allowed_quantities[0][$this->product->allowed_quantities_type === 'fixed'
            ? 'value'
            : 'maxValue'];
    }

    /**
     * Get quantity by selected value
     *
     *@return array
     */
    private function getQuantityBySelectedQuantityValue(): array|null
    {
        return collect($this->product->allowed_quantities)
            ->when($this->product->allowed_quantities_type === 'fixed', function ($collection) {
                return $collection->where("value", $this->selectedQuantityValue);
            }, function ($collection) {
                return $collection->where("minValue", "<=", $this->selectedQuantityValue)->where("maxValue", ">=", $this->selectedQuantityValue);
            })->first();
    }

    /**
     * Validate selected option interval
     *
     * @param string $attributeName
     * @param array $selectedOptionData
     * @param Illuminate\Validation\Validator|null $validator
     * @return bool
     */
    private function validatedSelectedOptionInterval(
        string $attributeName,
        array $selectedOptionData,
        Validator|null $validator = null
    ): bool {
        $attribute = $this->product->getAttributeByName($attributeName);

        if ($attribute->options_type === 'interval' && is_array($attribute->groups) && count($attribute->groups)) {
            foreach ($attribute->groups as $group) {
                // Check if interval is between the group limits
                if ((isset($group["minLimit"])
                        && is_numeric($group["minLimit"])
                        && $group["minLimit"] > $selectedOptionData["value"][$group['name']])
                    || (isset($group["maxLimit"])
                        && is_numeric($group["maxLimit"])
                        && $group["maxLimit"] < $selectedOptionData["value"][$group['name']])
                ) {
                    // if not add validation errors
                    call_user_func(
                        $validator
                            ? array($validator->errors(), 'add')
                            : array($this, "addError"),
                        sprintf("%s.%s", $attributeName, $group['name']),
                        __(":group is limited to :min < :max", [
                            "group" => $group['name'],
                            "min" => isset($group["minLimit"]) ? $group["minLimit"] : "",
                            "max" => isset($group["maxLimit"]) ? $group["maxLimit"] : "",
                        ])
                    );

                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Calculates the total and unit price
     *
     * @return void
     */
    private function calculatePrices(): void
    {
        $this->resetValidation('quantity');
        $this->resetValidation('selectedOption');

        $this->quantity = $this->getQuantityBySelectedQuantityValue();

        /** in case the entered quantity is not allowed */
        if (!$this->quantity) {
            $this->resetSelectedQuantityValue();
            $this->calculatePrices();
            $this->addError(
                'quantity',
                __("Quantity is not allowed. call customer service :number", ["number" => setting("site.phone")])
            );
            return;
        }

        $selectedOptionsTotalPrice = $this->selectedOptions->reduce(function (
            $carry,
            $selectedOption,
            $attributeName
        ) {
            if (!$this->validatedSelectedOptionInterval($attributeName, $selectedOption)) return;

            $option = $this->product->getOptionBySelectedOptionData($attributeName, $selectedOption);

            if (!$option) {
                $this->addError(
                    'selectedOption' . $attributeName,
                    __("Option not allowed")
                );
                return;
            }

            $optionPrices =  (array)$option["prices"];
            $optionPriceBasedOnQuantity = 0;

            if (
                is_array($optionPrices)
                && isset($optionPrices[$this->quantity['ref']])
                && is_numeric($optionPrices[$this->quantity['ref']])
            ) {
                $optionPriceBasedOnQuantity = $optionPrices[$this->quantity['ref']];
            }

            return $carry + $optionPriceBasedOnQuantity;
        }, 0);

        $this->totalPrice = $this->quantity["price"] + $selectedOptionsTotalPrice;

        if ($this->designByCompany) {
            $this->totalPrice += $this->product->design_price;
        }

        $this->unitPrice = $this->totalPrice / $this->selectedQuantityValue;
    }

    /**
     * Loops through every option and set the corresponding required files array
     *
     * @return void
     */
    public function findAndSetRequiredFiles(): void
    {
        $this->requiredFiles = [];

        $this->selectedOptions->each(function ($selectedOption, $attributeName) {
            $option = $this->product->getOptionBySelectedOptionData($attributeName, $selectedOption);

            if ($option && isset($option['requiredFilesProperties'])) {
                foreach ($option['requiredFilesProperties'] as $requiredFileProperties) {
                    $this->requiredFiles[$requiredFileProperties["name"]] = "";
                }
            }
        });

        if (!count($this->requiredFiles)) {
            $this->requiredFiles["recto"] = "";
        }
    }

    /**
     * Delete the media item from the component only
     *
     * @param int|string $mediaItemId
     * @return void
     */
    public function deleteOldMediaItemLocally(string $mediaItemId): void
    {
        if (!in_array($mediaItemId,  $this->oldMediaIdsToDelete)) {
            $this->oldMediaIdsToDelete[] = $mediaItemId;

            $this->oldMedia = $this->oldMedia->filter(function ($mediaItem) use ($mediaItemId) {
                return $mediaItem->id != $mediaItemId;
            });
        }
    }

    /**
     * Validate the requiredFiles and designFiles
     *
     * @param Illuminate\Validation\Validator
     * @return void
     */
    public function withValidatorClosure(Validator $validator): void
    {
        $validator->after(function ($validator) {
            // Validate options intervals and existence
            $this->selectedOptions->each(function ($selectedOption, $attributeName) use ($validator) {
                $this->validatedSelectedOptionInterval($attributeName, $selectedOption, $validator);

                if (!$this->product->getOptionBySelectedOptionData($attributeName, $selectedOption)) {
                    $validator->errors()->add('selectedOption', __("Option not allowed"));
                }
            });

            // validate options files
            if ($this->designByCompany) {
                if (count($this->designFiles) + count($this->oldMedia)  > 5) {
                    $validator->errors()->add("designFiles", __("5 files is the maximum allowed"));
                }
            } else {
                foreach ($this->requiredFiles as $requiredFileName => $file) {
                    if (!$file && !$this->oldMedia->where("name", $requiredFileName)->first()) {
                        $validator->errors()->add($requiredFileName, __("The file :file is required", [
                            "file" => $requiredFileName
                        ]));
                    }
                }
            }
        });
    }

    /**
     * Handles the final step
     *
     * @return void
     */
    public function handleSubmit(): void
    {
        if (!auth()->check()) redirect("/login");

        $this->withValidator(fn (Validator $validator) => $this->withValidatorClosure($validator))->validate();

        $itemData = [
            "quantity" => $this->selectedQuantityValue,
            "subtotal" => $this->totalPrice,
            "selected_options" => $this->selectedOptions,
            "design_by_company" => $this->designByCompany,
            "design_information" => $this->designInformation,
            "product_id" => $this->product->id
        ];
        $filesToUpload = $this->designByCompany ? $this->designFiles : $this->requiredFiles;

        $success = $this->editMode
            ? CartService::updateCartItem($this->cartItem->id, $itemData, $filesToUpload, $this->oldMediaIdsToDelete)
            : CartService::addItemToCart($itemData, $filesToUpload);

        if ($success) {
            redirect()->route("cart.index");
        } else {
            session()->flash(
                "error_message",
                __("Unknown error occurred. our team has been notified. try again !")
            );
        }
    }
}
