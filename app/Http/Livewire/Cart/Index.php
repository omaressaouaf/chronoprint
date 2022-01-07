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
     * @param App\Services\CartService $cartService
     * @param int|string $cartItemId
     * @return void
     */
    public function removeCartItem(CartService $cartService , int|string $cartItemId) : void
    {
        $cartService->removeItemFromCart($cartItemId);

        $this->emit('cartChanged');
    }
}
