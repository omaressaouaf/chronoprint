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
Route::get('/', function () {
    return view('home');
})->name("home");

Auth::routes();

Route::get("/categories/{slug}", [CategoryController::class, "show"])->name("categories.show");

Route::get("/products/{product:slug}", [ProductController::class, "show"])->name("products.show");

Route::get('/account', [AccountController::class, 'index'])->name('account.index');
