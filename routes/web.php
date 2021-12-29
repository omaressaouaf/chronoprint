<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Voyager\ProductController;

Route::get('/', function () {
    return view('home');
});


Route::group(['prefix' => 'admin'], function () {
    Route::put("/products/{product}/attributes", [ProductController::class, "syncAttributes"]);
    Voyager::routes();
});

Auth::routes();

Route::get('/account', [AccountController::class, 'index'])->name('account.index');
