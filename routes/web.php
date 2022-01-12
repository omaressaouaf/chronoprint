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
        Route::get('/addresses', [AccountController::class, 'addresses'])->name('addresses');
        Route::delete('/addresses/{address}', [AccountController::class, 'destroyAddress'])->name('addresses.destroy');
    });

    // Cart
    Route::view("/cart", "cart")->name("cart.index");

    //checkout
    Route::prefix("checkout")->as("checkout.")->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('index');
        Route::post("/", [CheckoutController::class, "store"])->name("store");
        Route::get("/complete", [CheckoutController::class, "complete"])->name("complete");
    });
});
