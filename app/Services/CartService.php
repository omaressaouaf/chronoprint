<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Media;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartService
{
    /**
     * Gets the current auth user cart
     *
     * @return App\Models\Cart
     *
     * @throws \Exception
     */
    public static function getAuthUserCart(): Cart
    {
        if (!auth()->check()) {
            throw new Exception("getAuthUserCart needs an authenticated user");
        }
        
        return auth()->user()->cart ?? Cart::create([
            "subtotal" => 0.00,
            "user_id" => auth()->id()
        ]);
    }

    /**
     * Adds item to the auth user's cart
     *
     * @param array $itemData
     * @param Illuminate\Support\Collection|array $filesToUpload
     * @return bool
     */
    public static function addItemToCart(array $itemData, Collection|array $filesToUpload): bool
    {
        try {
            DB::beginTransaction();

            $cartItem  = static::getAuthUserCart()->items()->create($itemData);

            static::uploadFiles($filesToUpload, $cartItem);

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
     * Updates cart item
     *
     * @param int|sring $cartItemId
     * @param array $newItemData
     * @param Illuminate\Support\Collection|array $filesToUpload
     * @param array $oldMediaIdsToDelete
     * @return void
     */
    public static function updateCartItem(
        int|string $cartItemId,
        array $newItemData,
        Collection|array $filesToUpload,
        array $oldMediaIdsToDelete
    ): bool {
        try {
            DB::beginTransaction();

            $cartItem = static::getAuthUserCart()->items()->find($cartItemId);
            $cartItem->update($newItemData);

            static::uploadFiles($filesToUpload, $cartItem);
            Media::destroy($oldMediaIdsToDelete);

            DB::commit();

            return true;
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::error("Exception Happened in CartService@updateCartItem : ",  [
                'exception message' => $ex->getMessage()
            ]);

            return false;
        }
    }

    /**
     * Upload files
     *
     * @param Illuminate\Support\Collection|array $filesToUpload
     * @param App\Models\CartItem $cartItem
     * @return void
     */
    private static function uploadFiles(Collection|array $filesToUpload, CartItem $cartItem)
    {
        foreach ($filesToUpload as $key => $value) {
            if ($value && is_array($value)) {
                foreach ($value['files'] as $file) {
                    if ($file) {
                        $cartItem->addMediaItem($file, $key);
                    }
                }
            } else {
                if ($value) {
                    $cartItem->addMediaItem($value, $key);
                }
            }
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
        CartItem::where("cart_id", static::getAuthUserCart()->id)->where("id", $cartItemId)->first()->delete();
    }

    /**
     * Applies coupon code to the auth user's cart
     *
     * @param string|null $couponCode
     * @return array
     */
    public static function applyCoupon(string|null $couponCode): array
    {
        $coupon = Coupon::where("code", $couponCode)->first();
        if (!$coupon) {
            return ["msg_type" => "error_message", "msg_content" => __("The coupon doesn't exist or expired")];
        }

        $authUserCart =  static::getAuthUserCart();
        if ($authUserCart->coupon_code) {
            return ["msg_type" => "error_message", "msg_content" => __("The cart already has a coupon applied")];
        }

        $authUserCart->update([
            "discount_price" => ($coupon->percent_off * $authUserCart->subtotal) / 100,
            "coupon_code" => $coupon->code,
        ]);

        return ["msg_type" => "success_message", "msg_content" => __("The coupon has been applied successfully")];
    }
}
