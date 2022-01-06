<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartService
{
    /**
     * Adds item to the auth user's cart
     *
     * @param array $item
     * @param Collection|array $filesToUpload
     * @return bool
     */
    public static function addItemToCart(array $item, Collection|array $filesToUpload): bool
    {
        try {
            DB::beginTransaction();

            $cart = Cart::firstOrCreate(
                ["user_id" => auth()->id()],
                ["subtotal" => 0.00]
            );

            $cartItem  = $cart->items()->create($item);

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
    public static function removeItemFromCart(string|int $cartItemId): void
    {
        CartItem::destroy($cartItemId);
    }
}
