<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductResourceController;
use App\Http\Controllers\WishlistController;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Http\Middleware\Admin;

Route::get('/', function(){
    return view('index', ['products' => Product::all()]);
});

Route::get('/', [ProductController::class, 'indexsearch'])->name('product.search');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::post('/profile', [ProfileController::class, 'store'])->name('storeProfile');

Route::post('/profile/delete', [ProfileController::class, 'deleteProfilepic'])->name('deleteProfilepic');

Route::get('/manage-product', function () {
    return view('manage-product', ['products' => Product::all()]);
})->middleware(Admin::class);

Route::get('/edit-product/{product:code}', function(Product $product){
    return view('edit-product', ['product' => $product]);
});

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

Route::resource('/products', ProductResourceController::class)->middleware('auth');
Route::post('/deleteImage/{product:code}/{index}', [ProductResourceController::class, 'deleteImage']);

Route::resource('/carts', CartController::class);
Route::post('/carts/{product_id}', [CartController::class, 'addToCart'])->name('addcart');
Route::post('/carts/product/{product_id}', [CartController::class, 'addToCartProduct'])->name('addcartproduct');
Route::post('/carts/sub/{cart_id}', [CartController::class, 'subQuantity'])->name('subqty');
Route::post('/carts/add/{cart_id}', [CartController::class, 'addQuantity'])->name('addqty');
Route::post('/carts/editqty/{cart_id}', [CartController::class, 'editQuantity'])->name('editqty');
Route::post('/carts/editsize/{cart_id}', [CartController::class, 'editSize'])->name('editsize');

Route::resource('/orders', OrderController::class)->middleware('auth');
Route::post('/orders/buy', [OrderController::class, 'storefromcart'])->name('storefromcart');
Route::post('/orders/received/{order_id}', [OrderController::class, 'orderReceived'])->name('received');

Route::get('/order/{username}', function($username){
    $user = User::where('username', $username)->firstOrFail();
    return view('user-order', ['orders' => Order::with('product')->where('user_id', $user->id)->get()]);
})->name('userorder');

Route::resource('/wishlist', WishlistController::class);
Route::post('/wishlist/{product_id}', [WishlistController::class, 'addwishlist'])->name('addwishlist');