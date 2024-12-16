<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'picture' => 'file|max:5120'
        ]);
        
        if ($request->file('picture')) {
            $validatedData['picture'] = $request->file('picture')->store('product-images');
        }
        
        $validatedData['slug'] = Str::slug($validatedData['name'], '-');

        Product::create($validatedData);
        return back()->with('successProduct', 'Produk berhasil ditambahkan!');
    }

    public function index() {
        return view('/index', [
            'products' => Product::all(),
        ]);
    }
    

    public function manage()
    {
        return view('/manage-product', ['products' => Product::all()]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        return view('/manage-product', ['products' => $products, 'search' => $search]);
    }

    public function indexsearch(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        return view('/', ['products' => $products, 'search' => $search]);
    }
}
