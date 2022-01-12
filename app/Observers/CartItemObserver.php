<?php

namespace App\Observers;

use App\Models\Cart;
use App\Models\CartItem;

class CartItemObserver
{
    /**
     * Increase mutation type
     *
     * @var string
     */
    private static string $INCREASE_SUBTOTAL = "increase";

    /**
     * Decrease mutation type
     *
     * @var string
     */
    private static string $DECREASE_SUBTOTAL = "decrease";

    public function created(CartItem $cartItem)
    {
        $this->mutateCartSubtotal($cartItem, static::$INCREASE_SUBTOTAL);
    }

    public function updating(CartItem $cartItem)
    {
        $this->mutateCartSubtotal($cartItem, static::$DECREASE_SUBTOTAL);
    }

    public function updated(CartItem $cartItem)
    {
        $this->mutateCartSubtotal($cartItem, static::$INCREASE_SUBTOTAL);
    }

    public function deleted(CartItem $cartItem)
    {
        $this->mutateCartSubtotal($cartItem, static::$DECREASE_SUBTOTAL);
    }

    /**
     * Mutates the cart subtotal
     *
     * @param \App\Models\CartItem $cartItem
     * @param string $mutationType
     * @return void
     */
    private function mutateCartSubtotal(CartItem $cartItem, string $mutationType): void
    {
        $cart = Cart::find($cartItem->cart_id);

        $newSubtotal = $mutationType === static::$INCREASE_SUBTOTAL
            ?  $cart->subtotal + $cartItem->subtotal
            : $cart->subtotal - $cartItem->subtotal;

        $cart->update([
            "subtotal" => $newSubtotal
        ]);
    }
}
