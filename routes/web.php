<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Brands
Route::get('/brands', [App\Http\Controllers\BrandController::class, 'index'])->name('brands');
Route::get('/brand/{brand}/products', [App\Http\Controllers\BrandController::class, 'products'])->name('brands_products');

// Products
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('show_products');


// Cart
Route::get('cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('add-to-cart/{product}', [App\Http\Controllers\CartController::class, 'store'])->name('add_to_cart');
Route::patch('update-cart', [App\Http\Controllers\CartController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [App\Http\Controllers\CartController::class, 'remove'])->name('remove_from_cart');

// Order
Route::get('orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
Route::post('checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');

Auth::routes();
