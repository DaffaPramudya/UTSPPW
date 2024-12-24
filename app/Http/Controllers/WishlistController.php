<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('wishlist', ['wishlists' => Wishlist::where('user_id', auth()->id())->get()]);
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

    public function addwishlist($product_id)
    {
        if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $product_id)->exists()) {
            return back()->with('error', 'Produk sudah ada di wishlist!');
        }
        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $product_id,
        ]);
        return back()->with('success', 'Produk berhasil ditambahkan ke wishlist!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        Wishlist::destroy($wishlist->id);
        return back()->with('success', 'Wishlist berhasil dihapus!');
    }
}
