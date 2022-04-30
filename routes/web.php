<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DealersProgramController;
use App\Http\Controllers\GraphicServiceController;
use App\Http\Controllers\Voyager\MediaController;
use App\Http\Controllers\Voyager\InvoiceController;
use App\Http\Controllers\Voyager\NotificationController;
use App\Http\Controllers\Voyager\ProductController as VoyagerProductController;

/**
 * Admin routes
 */
Route::prefix("admin")->group(function () {
    Voyager::routes();

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
});

/*---------------------------------------------------------------------------------------------------------*/

/**
 * Front routes
 */
Auth::routes();

// Static pages (Home, about ...)
Route::view('/', "home")->name("home");
Route::view("/a-propos-de-nous", "about")->name("about");
Route::view("/guide-impression", "guide")->name("guide");
Route::view("/politique-de-confidentialite", "privacy-policy")->name("privacy-policy");
Route::view("/mention-legale", "legal-notice")->name("legal-notice");

// Blog
Route::prefix("blog")->as("blog.")->group(function () {
    Route::get("/", [BlogController::class, "index"])->name("index");
    Route::get("/{post}", [BlogController::class, "show"])->name("show");
});

// Contact
Route::prefix("contact")->as("contact.")->group(function () {
    Route::get("/", [ContactController::class, "index"])->name("index");
    Route::post("/", [ContactController::class, "store"])->name("store");
});

// Dealers program
Route::prefix("programme-revendeurs")->as("dealers-program.")->group(function () {
    Route::get("/", [DealersProgramController::class, "index"])->name("index");
    Route::post("/", [DealersProgramController::class, "store"])->name("store");
});

// Categories & Graphic services (shop)
Route::get("/categories/{slug}", [CategoryController::class, "show"])->name("categories.show");
Route::get("/services-graphiques", GraphicServiceController::class)->name("graphic-services");

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
