<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'picture' => 'required|file|max:5120'
        ]);

        if($request->file('picture')) {
            $validatedData['picture'] = $request->file('picture')->store('product-images');
        }

        Product::create($validatedData);
        return back()->with('successProduct', 'Produk berhasil ditambahkan!');
    }

    public function show()
    {
        return view('/manage-product', ['products' => Product::all()]);
    }

    public function search(Request $request) {
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        return view('/manage-product', ['products' => $products, 'search' => $search]);
    }

    public function edit(Request $request) {
        
    }
}
