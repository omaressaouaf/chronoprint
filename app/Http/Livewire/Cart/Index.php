<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;
use App\Services\CartService;

class Index extends Component
{
    public function render()
    {
        return view('livewire.cart.index', [
            "cart" => Cart::where("user_id", auth()->id())->with(["items", "items.product"])->first()
        ]);
    }

    /**
     * Removes item from cart
     *
     * @param int|string $cartItemId
     * @return void
     */
    public function removeCartItem(int|string $cartItemId) : void
    {
        CartService::removeItemFromCart($cartItemId);

        $this->emit('cartChanged');
    }
}
