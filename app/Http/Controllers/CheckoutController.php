<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = CartService::getAuthUserCart()->load(["items", "items.product"]);
        $this->authorize("checkout", $cart);

        return view("checkout.index", [
            "cart" => $cart
        ]);
    }

    public function store(Request $request, CheckoutService $checkoutService)
    {
        $cart = CartService::getAuthUserCart()->load(["items", "items.product"]);
        $this->authorize("checkout", $cart);

        $request->validate([
            "address_id" => "required",
            "additional_information" => "nullable",
            "payment_mode" => "required|in:cash,credit_card"
        ]);

        ["msg_type" => $msgType, "msg_content" => $msgContent]  = $checkoutService->checkout(
            $request->address_id,
            $request->additional_information,
            $request->payment_mode,
            $cart
        );

        return redirect()->route("checkout.complete")->with($msgType, $msgContent);
    }

    public function complete()
    {
        if (!session("success_message") && !session("error_message")) {
            return redirect()->route("cart.index");
        }

        return view("checkout.complete");
    }
}
