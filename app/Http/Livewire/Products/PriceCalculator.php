<?php

namespace App\Http\Livewire\Products;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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
            "requiredFiles" => "required_if:designByCompany,false",
            "requiredFiles.*" => "required_if:designByCompany,false|" . $file_rules,
            "designFiles" => "nullable|array|max:5",
            "designFiles.*" => "nullable|" . $file_rules
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

        $this->findAndSetRequiredFiles();
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

    public function findAndSetRequiredFiles()
    {
        $this->requiredFiles = [];

        $this->selectedOptions->each(function ($optionRef, $attributeName) {
            $option = $this->product->getOptionByRef($attributeName, $optionRef);

            if (isset($option['requiredFilesProperties'])) {
                foreach ($option['requiredFilesProperties'] as $requiredFileProperties) {
                    $this->requiredFiles[$requiredFileProperties["name"]] = "";
                }
            }
        });

        if (!count($this->requiredFiles)) {
            $this->requiredFiles["recto"] = "";
        }
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

    public function addToCart()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            // create and persist new cartItem
            $cart = Cart::firstOrCreate(
                ["user_id" => auth()->id()],
                ["subtotal" => 0.00]
            );

            $cartItem  = $cart->items()->create([
                "quantity" => $this->selectedQuantityValue,
                "subtotal" => $this->totalPrice,
                "selected_options" => $this->selectedOptions,
                "design_by_company" => $this->designByCompany,
                "design_information" => $this->designInformation,
                "product_id" => $this->product->id
            ]);

            $cart->subtotal += $this->totalPrice;
            $cart->save();

            // upload and associate the files with the cart item
            $filesToUpload = $this->designByCompany ? $this->designFiles : $this->requiredFiles;
            foreach ($filesToUpload as $key => $file) {

                $path = $file->store(
                    "carts/$cart->id/items/$cartItem->id",
                    "public"
                );

                $cartItem->media()->create([
                    "name" => $key,
                    "filename" => $file->hashName(),
                    "path" => $path,
                    "mime_type" => $file->getMimeType(),
                    "size" => $file->getSize()
                ]);
            }

            DB::commit();

            // redirect to cart
            redirect()->route("cart.index");
        } catch (\Exception $ex) {
            DB::rollBack();
            dd("some error : " . $ex->getMessage());
        }
    }
}
