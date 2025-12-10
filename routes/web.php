<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\AuthController;
use App\Models\Product;
use App\Http\Controllers\CartController;

// Home page
Route::get('/', function () {
    $products = Product::all();
    return view('index', compact('products'));
})->name('home');

// Customize page
Route::get('/customize', function () {
    return view('customize');
})->name('customize');

// Single product page
Route::get('/product/{slug}', function ($slug) {
    $product = Product::where('slug', $slug)->firstOrFail();
    return view('products.show', compact('product'));
})->name('product.show');

// Cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

// Public members page
Route::get('/members', [MemberController::class, 'index'])->name('members.index');

// Temporary admin login for testing
Route::get('/temp-admin-login', function () {
    session(['admin' => ['id' => 1, 'role' => 'admin']]);
    return redirect('/admin/products');
});

// Admin routes
Route::prefix('admin')->middleware('isAdmin')->group(function () {

    // Products CRUD with simple search
    Route::resource('products', ProductController::class);

    // Members CRUD (excluding index/show)
    Route::resource('members', MemberController::class)->except(['index', 'show']);
});

// Admin auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

