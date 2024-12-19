<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductResourceController;
use App\Models\Product;

Route::get('/', [ProductController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::post('/profile', [ProfileController::class, 'store'])->name('storeProfile');

Route::post('/profile/delete', [ProfileController::class, 'deleteProfilepic'])->name('deleteProfilepic');

Route::get('/manage-product', function () {
    return view('manage-product', ['products' => Product::all()]);
});

Route::get('/edit-product/{product:code}', function(Product $product){
    return view('edit-product', ['product' => $product]);
});

Route::get('/manage-product', [ProductController::class, 'show']);

Route::post('/manage-product', [ProductController::class, 'store']);


Route::get('/manage-product', [ProductController::class, 'search'])->name('products-search');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', function () {
    return view('register');
})->middleware('guest')->name('register');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/cart', function(){
    return view('cart');
});

Route::resource('/products', ProductResourceController::class)->middleware('auth');
Route::post('/deleteImage/{product:code}/{index}', [ProductResourceController::class, 'deleteImage']);

Route::resource('/carts', CartController::class);
Route::post('/carts/{product_id}', [CartController::class, 'addToCart']);
Route::post('/carts/sub/{cart_id}', [CartController::class, 'subQuantity']);
Route::post('/carts/add/{cart_id}', [CartController::class, 'addQuantity']);