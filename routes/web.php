<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| that contains the "web" middleware group.
|
*/

// -------------------------------
// Home / Index page (dynamic)
// -------------------------------
Route::get('/', function () {
    // Fetch all products from the database
    $products = Product::all();

    // Pass products to the index view
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
    // Fetch product by slug or fail if not found
    $product = Product::where('slug', $slug)->firstOrFail();

    // Pass product to the single product view
    return view('products.show', compact('product'));
})->name('product.show');

// -------------------------------
// Cart routes (controller-based)
// -------------------------------
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

// -------------------------------
// Admin CRUD routes
// -------------------------------
Route::prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});
