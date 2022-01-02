<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Collection;

class PriceCalculator extends Component
{

    public Product $product;

    public Collection $selectedOptions;

    public int|string $selectedQuantityValue;

    public bool $designByCompany = false;

    public float $unitPrice;

    public float $totalPrice;

    public string $errorMessage;

    public function mount()
    {
        $this->selectedOptions = collect([]);

        $this->selectedQuantityValue = $this->product->allowed_quantities[0]["value"];

        $this->product->attributes->each(function ($attribute) {
            $this->selectedOptions->put($attribute->name, $attribute->pivot->options[0]["ref"]);
        });

        $this->calculatePrices();
    }

    public function render()
    {
        return view('livewire.products.price-calculator');
    }

    private function calculatePrices()
    {
        $selectedOptionsTotalPrice = $this->selectedOptions->reduce(function ($carry, $optionRef, $attributeName) {
            $attribute =  $this->product->attributes->where("name", $attributeName)->first();
            $option = collect($attribute->pivot->options)->where("ref", $optionRef)->first();

            /** in case millisious user tries to tamper with the option */
            if (!$option) {
                $this->mount();
                return;
            }

            return $carry + $option["price"];
        }, 0);

        $quantity = collect($this->product->allowed_quantities)->where("value", $this->selectedQuantityValue)->first();

        /** in case millisious user tries to tamper with the quantity */
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

    public function updatedSelectedOptions()
    {
        $this->calculatePrices();
    }

    public function updatedSelectedQuantityValue()
    {
        $this->calculatePrices();
    }

    public function updatedDesignByCompany()
    {
        $this->calculatePrices();
    }
}
