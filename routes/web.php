<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

// Home / Index page
Route::get('/', function () {
    return view('index');
})->name('home');

// Customize page
Route::get('/customize', function () {
    return view('customize');
})->name('customize');

// Dynamic route for all products (index + custom)
Route::get('/product/{slug}', function ($slug) {
    return view('products.' . $slug);
})->name('product.show');

// ✅ Cart routes (controller-based)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
