<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;
use App\Services\CartService;

class Dropdown extends Component
{
    protected $listeners = ['cartChanged' => 'render'];

    public function render()
    {
        return view('livewire.cart.dropdown', [
            "cart" => Cart::where("user_id", auth()->id())->with(["items", "items.product"])->first()
        ]);
    }
}
