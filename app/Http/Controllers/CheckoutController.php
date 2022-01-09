<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = CartService::getAuthUserCart()->load(["items", "items.product"]);
        $this->authorize("checkout", $cart);

        return view("checkout", [
            "cart" => $cart
        ]);
    }

    public function store()
    {
        $cart = CartService::getAuthUserCart()->load(["items", "items.product"]);
        $this->authorize("checkout", $cart);
    }
}
