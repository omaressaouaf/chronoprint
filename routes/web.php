<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Voyager\ProductController as VoyagerProductController;

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::put("/products/{product}/attributes", [VoyagerProductController::class, "syncAttributes"]);
    Voyager::routes();
});

/**
 * Front routes
 */
Auth::routes();

Route::view('/', "home")->name("home");

// Categories (shop)
Route::get("/categories/{slug}", [CategoryController::class, "show"])->name("categories.show");

// Products
Route::get("/products/{product:slug}", [ProductController::class, "show"])->name("products.show");

Route::middleware(["auth"])->group(function () {
    // Account
    Route::prefix("account")->as("account.")->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('index');
        Route::get('/profile', [AccountController::class, 'profile'])->name('profile');
        Route::put('/profile', [AccountController::class, 'updateProfile'])->name('profile.update');
        Route::get('/password', [AccountController::class, 'password'])->name('password');
        Route::put('/password', [AccountController::class, 'updatePassword'])->name('password.update');
    });

    // Cart
    Route::view("/cart", "cart")->name("cart.index");

    //checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post("/checkout", [CheckoutController::class, "store"])->name("checkout.store");
});
