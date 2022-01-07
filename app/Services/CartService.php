<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartService
{
    /**
     * @var App\Models\Cart $cart
     */
    public Cart $cart;

    /**
     * Create a new cart instance
     *
     * @return void
     */
    public function __construct()
    {
        if (!auth()->check()) {
            throw new Exception("The cart service requires an authenticated user");
        }

        $this->cart  = auth()->user()->cart ?? Cart::create([
            "subtotal" => 0.00,
            "user_id" => auth()->id()
        ]);
    }

    /**
     * Adds item to the auth user's cart
     *
     * @param array $item
     * @param Collection|array $filesToUpload
     * @return bool
     */
    public function addItemToCart(array $item, Collection|array $filesToUpload): bool
    {
        try {
            DB::beginTransaction();

            $cartItem  = $this->cart->items()->create($item);

            foreach ($filesToUpload as $key => $file) {
                $path = $file->store($cartItem->mediaRootFolderPath(), "public");

                $cartItem->media()->create([
                    "name" => $key,
                    "filename" => $file->hashName(),
                    "path" => $path,
                    "mime_type" => $file->getMimeType(),
                    "size" => $file->getSize()
                ]);
            }

            DB::commit();

            return true;
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error("Exception Happened in CartService@addItemToCart : ",  [
                'exception message' => $ex->getMessage()
            ]);

            return false;
        }
    }

    /**
     * Removes item from the auth user's cart
     *
     * @param string|int $cartItemId
     * @return void
     */
    public function removeItemFromCart(string|int $cartItemId): void
    {
        CartItem::where("cart_id" , $this->cart->id)->where("id" , $cartItemId)->delete();
    }
}
