<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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
Route::view('/', "home")->name("home");

Auth::routes();

// Categories (shop)
Route::get("/categories/{slug}", [CategoryController::class, "show"])->name("categories.show");

// Products
Route::get("/products/{product:slug}", [ProductController::class, "show"])->name("products.show");

Route::middleware(["auth"])->group(function () {
    // Account
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');

    // Cart
    Route::view("/cart", "cart")->name("cart.index");
});
