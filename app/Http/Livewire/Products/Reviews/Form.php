<?php

namespace App\Http\Livewire\Products\Reviews;

use App\Models\Product;
use Livewire\Component;

class Form extends Component
{
    public Product $product;

    public int $rating = 5;

    public string $review = "";

    public function render()
    {
        return view('livewire.products.reviews.form');
    }

    /**
     * Handles the submit action
     *
     * @return void
     */
    public function handleSubmit(): void
    {
        session()->flash("success_message"  , __("Thank you for your review. it's now under supervision"));
    }
}
