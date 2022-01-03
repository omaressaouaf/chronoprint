<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Validation\Validator;

class PriceCalculator extends Component
{
    use WithFileUploads;

    public Product $product;

    /**
     * the user selected options
     * ex : [
     *  "size" => "optionRef",
     *  "material" => "optionRef"
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

    /**
     * If there are no required files we should at least show one file
     * @var bool
     */
    public bool $noRequiredFiles = true;

    public int|string $selectedQuantityValue;

    public bool $designByCompany = false;

    public string $designInformation = "";

    public $designFiles = [];

    public float $unitPrice;

    public float $totalPrice;

    protected function rules()
    {
        $file_rules = "file|max:10240|mimes:jpg,jpeg,png,gif,eps,ai,svg,pdf,zip,tar,rar,cdr,psd";

        return [
            'selectedOptions' => 'required',
            "selectedQuantityValue" => "required|numeric",
            'designByCompany' => "required|boolean",
            "totalPrice" => "required|numeric|min:1",
            "requiredFiles.*" => $file_rules,
            "designFiles.*" => $file_rules
        ];
    }

    public function mount()
    {
        $this->selectedOptions = collect([]);

        $this->selectedQuantityValue = $this->product->allowed_quantities[0]["value"];

        $this->product->attributs->each(function ($attribute) {
            $this->selectedOptions->put($attribute->name, $attribute->pivot->options[0]["ref"]);
        });

        $this->calculatePrices();

        $this->checkIfThereAreNoRequiredFiles();
    }

    public function render()
    {
        return view('livewire.products.price-calculator');
    }

    private function calculatePrices()
    {
        $selectedOptionsTotalPrice = $this->selectedOptions->reduce(function ($carry, $optionRef, $attributeName) {
            $option = $this->product->getOptionByRef($attributeName, $optionRef);

            /** in case a millisious user tries to tamper with the option */
            if (!$option) {
                $this->mount();
                return;
            }

            return $carry + $option["price"];
        }, 0);

        $quantity = collect($this->product->allowed_quantities)->where("value", $this->selectedQuantityValue)->first();

        /** in case a millisious user tries to tamper with the quantity */
        if (!$quantity) {
            $this->mount();
            return;
        }

        $this->totalPrice = $quantity["price"] + ($selectedOptionsTotalPrice * $quantity["value"]);

        if ($this->designByCompany) {
            $this->totalPrice += $this->product->design_price;
        }

        $this->unitPrice = $this->totalPrice / $quantity["value"];
    }

    public function checkIfThereAreNoRequiredFiles()
    {
        $this->noRequiredFiles = true;

        $this->selectedOptions->each(function ($optionRef, $attributeName) {
            $option = $this->product->getOptionByRef($attributeName, $optionRef);

            if (isset($option['requiredFilesProperties']) && count($option['requiredFilesProperties'])) {
                $this->noRequiredFiles = false;

                return false;
            }
        });
    }

    public function updatedSelectedOptions()
    {
        $this->calculatePrices();

        $this->checkIfThereAreNoRequiredFiles();
    }

    public function updatedSelectedQuantityValue()
    {
        $this->calculatePrices();
    }

    public function updatedDesignByCompany()
    {
        $this->calculatePrices();
    }

    public function addToCart()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                /**The files are only required if the design is by the user */
                if (!$this->designByCompany) {
                    $this->selectedOptions->each(function ($optionRef, $attributeName) use ($validator) {
                        $option = $this->product->getOptionByRef($attributeName, $optionRef);

                        /** if the option requires files we loop through the requiredFilesProperties
                         * and we check if $this->requiredFiles does not contain the name of the current required file (ex : recto)
                         */
                        if (isset($option["requiredFilesProperties"])) {
                            foreach ($option["requiredFilesProperties"] as $requiredFileProperty) {
                                if (!isset($this->requiredFiles[$requiredFileProperty["name"]])) {
                                    $validator->errors()->add('selectedOptionsRequiredFiles.*', __("The files are required"));
                                    break;
                                }
                            }
                        }
                    });
                }
            });
        })->validate();
        // create and persist new cartItem

        // upload and associate the files with the cart item

        // redirect to cart
    }
}
