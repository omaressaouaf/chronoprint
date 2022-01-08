<?php

namespace App\Http\Livewire\Products\Reviews;

use App\Models\Product;
use Livewire\Component;

class Form extends Component
{
    public Product $product;

    public int $rating = 5;

    public string $body = "";

    protected $rules = [
        "rating" => "required|numeric|min:1|max:5",
        "body" => "required"
    ];

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
        if (!auth()->check()) {
            redirect("login");
            return;
        }

        $this->validate();

        $this->product->reviews()->create([
            "rating" => $this->rating,
            "body" => $this->body,
            "user_id" => auth()->id()
        ]);

        $this->rating = 5;
        $this->body = "";

        session()->flash("success_message", __("Thank you for your review"));
        $this->emit("reviewAdded");
    }
}
