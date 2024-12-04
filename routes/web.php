<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use GuzzleHttp\Middleware;

Route::get('/', function () {
    return view('index');
});

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');

Route::post('/profile', [ProfileController::class, 'store']);

Route::post('/profile/delete', [ProfileController::class, 'deleteProfilepic'])->name('deleteProfilepic');

Route::get('/manage-product', function () {
    return view('manage-product');
});

Route::get('/manage-product', [ProductController::class, 'show']);

Route::post('/manage-product', [ProductController::class, 'store']);


Route::get('/manage-product', [ProductController::class, 'search'])->name('products-search');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', function () {
    return view('register');
})->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/edit-product', function(){
    return view('edit-product', ['products'=>Product::all()]);
});

Route::post('/edit-product', [ProductController::class, 'edit']);

Route::post('/edit-product', [ProductController::class, 'delete'])->name('delete-product');