<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GraphicServiceController;
use App\Http\Controllers\Voyager\MediaController;
use App\Http\Controllers\Voyager\InvoiceController;
use App\Http\Controllers\Voyager\NotificationController;
use App\Http\Controllers\Voyager\ProductController as VoyagerProductController;

/**
 * Admin routes
 */
Route::prefix("admin")->group(function () {
    Route::middleware("auth")->as("admin.")->group(function () {
        // Products
        Route::put("/products/{id}/attributes", [VoyagerProductController::class, "syncAttributes"]);

        // Invoices
        Route::get("/invoices/{order}", InvoiceController::class)->name("invoices.index");

        // Media
        Route::get("/media/{media}", [MediaController::class, "download"])->name("media.download");

        // Notifications
        Route::delete('/notifications', [NotificationController::class, 'deleteNotifications']);
        Route::put('/notifications', [NotificationController::class, 'markNotifications']);
    });
    Voyager::routes();
});

/*---------------------------------------------------------------------------------------------------------*/

/**
 * Front routes
 */
Auth::routes();

// Home & About
Route::view('/', "home")->name("home");
Route::view("/about" , "about")->name("about");

// Contact
Route::get("/contact", [ContactController::class, "index"])->name("contact.index");
Route::post("/contact", [ContactController::class, "store"])->name("contact.store");

// Categories & Graphic services (shop)
Route::get("/categories/{slug}", [CategoryController::class, "show"])->name("categories.show");
Route::get("/graphic-services" , GraphicServiceController::class)->name("graphic-services");

// Products
Route::get("/products/{product:slug}", [ProductController::class, "show"])->name("products.show");

Route::middleware(["auth"])->group(function () {
    // Account
    Route::prefix("account")->as("account.")->group(function () {
        Route::get('/orders', [AccountController::class, 'orders'])->name('orders');
        Route::get('/orders/{id}', [AccountController::class, 'showOrder'])->name('orders.show');
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
