<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\CartItem;
use App\Models\Attribute;
use App\Services\CartService;
use Illuminate\Support\Collection;
use Illuminate\Validation\Validator;
use App\Traits\WithLivewireFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Arr;

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
     *   "recto verso" => [
     *       "recto" => ["files" => ["livewirefile1" ,  "livewirefile2"], "max" => 2]],
     *       "verso" => ["files" => ["livewirefile1" ,  "livewirefile2"], "max" => 2]]
     *   ],
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
            "requiredFiles.*.files.*" => ["nullable", $fileRules],
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
            $this->resetSelectedQuantityValue();
            $this->designByCompany = $this->product->category?->is_graphic_service ?? false;
        }

        $this->setAndSanitizeSelectedOptions();

        $this->calculatePrices();

        $this->findAndSetRequiredFiles();
    }

    public function updatedSelectedOptions()
    {
        $this->setAndSanitizeSelectedOptions();

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
     * Set valid selected options and removes the ones that should be disabled
     *
     * @return void
     */
    private function setAndSanitizeSelectedOptions()
    {
        $this->product->attributs->each(function ($attribute) {
            $selectedOption = isset($this->selectedOptions[$attribute->name])
                ? $this->selectedOptions[$attribute->name]
                : [];

            if (
                (!isset($selectedOption["ref"]) && !isset($selectedOption["ref"]))
                || (isset($selectedOption["ref"]) && $this->optionShouldBeDisabled($selectedOption['ref']))
            ) {
                $firstValidOption = collect($attribute->pivot->options)
                    ->reject(function ($option) {
                        return $this->optionShouldBeDisabled($option['ref']);
                    })
                    ->first();

                // If there is no valid selected option (entire attribute should be disabled) then we forget and skip the current attribute
                if (!$firstValidOption) {
                    $this->selectedOptions->forget($attribute->name);
                    return true;
                }

                if ($attribute->options_type === 'fixed') {
                    $selectedOption["ref"] = $firstValidOption["ref"];
                } else {
                    if (is_array($attribute->groups) && count($attribute->groups)) {
                        foreach ($attribute->groups as $group) {
                            $selectedOption["value"][$group['name']] = is_numeric($group['maxLimit'])
                                ? $group['maxLimit']
                                : $firstValidOption["maxValue"];
                        }
                    } else {
                        $selectedOption["value"] = $firstValidOption["maxValue"];
                    }
                }

                $this->selectedOptions->put($attribute->name, $selectedOption);
            }
        });
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
    private function validateSelectedOptionInterval(
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
            if (!$this->validateSelectedOptionInterval($attributeName, $selectedOption)) return;

            $option = $this->product->getOptionBySelectedOptionData($attributeName, $selectedOption);

            if (!$option) {
                $this->addError(
                    'selectedOption' . $attributeName,
                    __("Option not allowed")
                );
                return;
            }

            $optionPrices =  isset($option["prices"]) ? (array)$option["prices"] : [];
            $optionPricesPerOption =  isset($option["pricesPerOption"]) ? (array)$option["pricesPerOption"] : [];
            $optionPriceBasedOnQuantity = 0;

            $optionPricesPerSelectedOptions = Arr::only(
                $optionPricesPerOption,
                $this->selectedOptions->pluck("ref")->toArray()
            );
            $optionPricesPerFirstSelectedOption = Arr::first($optionPricesPerSelectedOptions);

            if (
                is_array($optionPricesPerSelectedOptions)
                && isset($optionPricesPerFirstSelectedOption[$this->quantity['ref']])
                && is_numeric($optionPricesPerFirstSelectedOption[$this->quantity['ref']])
            ) {
                $optionPriceBasedOnQuantity = $optionPricesPerFirstSelectedOption[$this->quantity['ref']];
            } else if (
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
                    $this->requiredFiles[$requiredFileProperties["name"]]["files"] = [];
                    $this->requiredFiles[$requiredFileProperties["name"]]["max"] =
                        isset($requiredFileProperties["max"]) && is_numeric($requiredFileProperties["max"])
                        ? $requiredFileProperties["max"]
                        : null;
                }
            }
        });

        if (!count($this->requiredFiles)) {
            $this->requiredFiles["recto"] = [
                "files" => [],
                "max" => 1
            ];
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
     * Checks if the given option should be disabled
     *
     * @param string $optionRef
     * @return bool
     */
    public function optionShouldBeDisabled(string $optionRef)
    {
        return $this->selectedOptions->contains(function ($selectedOption, $attributeName) use ($optionRef) {
            $option = $this->product->getOptionBySelectedOptionData($attributeName, $selectedOption);

            return isset($option['disabledOptions']) && in_array($optionRef, $option['disabledOptions']);
        });
    }

    /**
     * Checks if given attribute should be disabled
     *
     * @param App\Models\Attribute $attribute
     * @return bool
     */
    public function attributeShouldBeDisabled(Attribute $attribute)
    {
        return collect($attribute->pivot->options)
            ->every(fn ($option) => $this->optionShouldBeDisabled($option['ref']));
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
                $this->validateSelectedOptionInterval($attributeName, $selectedOption, $validator);

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
                foreach ($this->requiredFiles as $requiredFileName => $requiredFileProperties) {
                    $totalRequiredFilesCount = count($requiredFileProperties["files"]) + $this->oldMedia->where("name", $requiredFileName)->count();

                    if ($totalRequiredFilesCount < 1) {
                        $validator->errors()->add($requiredFileName, __(":name file(s) are required", [
                            "name" => $requiredFileName
                        ]));
                    }

                    if ($requiredFileProperties["max"] && $totalRequiredFilesCount > $requiredFileProperties["max"]) {
                        $validator->errors()->add($requiredFileName, __("maximum :name file(s) is :max", [
                            "name" => $requiredFileName,
                            "max" => $requiredFileProperties["max"]
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
