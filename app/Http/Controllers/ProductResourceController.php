<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric|min:100000',
            'stock' => 'required|numeric|min:1',
            'category' => 'required',
            'description' => 'required',
            // 'pictures' => 'required|array|min:1',
        ]);

        $faker = Faker::create();
        $validatedData['code'] = strtoupper($faker->unique()->bothify('?#??#'));

        $pictures = [];

        if ($request->has('pictures')) {
            foreach ($request->file('pictures') as $file) {
                $pictures[] = $file->store('product-images');
            }
        }

        // $validatedData['slug'] = Str::slug($validatedData['name'], '-');
        $validatedData['pictures'] = json_encode($pictures);
        Product::create($validatedData);
        return back()->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('edit-product', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:100000',
            'stock' => 'required|numeric|min:1',
            'discount' => 'numeric|min:0|max:99',
            'category' => 'required',
            'description' => 'required',
        ]);

        $pictures = json_decode($product->pictures, true) ?? [];
        if ($request->has('pictures')) {
            foreach ($request->file('pictures') as $file) {
                $pictures[] = $file->store('product-images');
            }
        }

        $validatedData['pictures'] = json_encode($pictures);
        Product::where('code', $product->code)->update($validatedData);
        return back()->with('success', 'Produk berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $pictures = json_decode($product->pictures, true);
        foreach ($pictures as $picture) {
            Storage::delete($picture);
        }
        Product::destroy($product->id);
        return back()->with('success', 'Produk berhasil dihapus');
    }

    public function deleteImage(Product $product, $index)
    {
        $pictures = json_decode($product->pictures);
        Storage::delete($pictures[$index]);
        unset($pictures[$index]);
        $product->pictures = json_encode(array_values($pictures));
        $product->save();
        return back()->with('success', 'Foto berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        return view('/manage-product', ['products' => $products, 'search' => $search]);
    }
}
