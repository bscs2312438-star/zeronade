<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MemberController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// -------------------------------
// Home / Index page (dynamic)
// -------------------------------
Route::get('/', function () {
    $products = Product::all();
    return view('index', compact('products'));
})->name('home');

// -------------------------------
// Customize page
// -------------------------------
Route::get('/customize', function () {
    return view('customize');
})->name('customize');

// -------------------------------
// Dynamic single product page
// -------------------------------
Route::get('/product/{slug}', function ($slug) {
    $product = Product::where('slug', $slug)->firstOrFail();
    return view('products.show', compact('product'));
})->name('product.show');

// -------------------------------
// Cart routes
// -------------------------------
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

// -------------------------------
// Public Members Page (unified index)
// -------------------------------
Route::get('/members', [MemberController::class, 'index'])->name('members.index');

// -------------------------------
// Admin CRUD routes (Products + Members)
// -------------------------------
Route::prefix('admin')->group(function () {
    // Products CRUD
    Route::resource('products', ProductController::class);

    // Members CRUD (admin only)
    Route::resource('members', MemberController::class)->except(['index', 'show']);
});
