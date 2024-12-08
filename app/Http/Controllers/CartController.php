<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/cart', ['carts' => Cart::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        $cart->quantity = $request->input('quantity');
        $cart->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('success', 'Produk berhasil dihapus!');
    }

    public function addToCart($product_id) {
        if(Cart::where('user_id', auth()->user()->id)->where('product_id', $product_id)->exists()){
            return back()->with('error', 'Produk sudah ada di keranjang!');
        }
        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product_id,
            'quantity' => 1,
        ]);
        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function subQuantity($cart_id) {
        $cart = Cart::findOrFail($cart_id);
        if($cart->quantity == 1) {
            return back()->with('error', 'Kuantitas minimal 1');
        }
        $cart->quantity --;
        $cart->save();
        return back();
    }

    public function addQuantity($cart_id) {
        $cart = Cart::findOrFail($cart_id);
        $cart->quantity ++;
        $cart->save();
        return back();
    }
}
