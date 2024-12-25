<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('order');
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
        $orders = Order::whereHas('cart', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();
        foreach($orders as $order) {
            $order->payment = $request->payment;
            $order->shipment = $request->shipment;
            $order->cart_id = null;
            $order->save();
        }
        return view('index', ['products' => Product::all()])->with('success', 'Barang berhasil dibeli!');
    }

    public function storefromcart()
    {
        $user_id = auth()->id();
        $carts = Cart::where('user_id', $user_id)->get();

        foreach ($carts as $cart) {
            Order::firstOrCreate([
                'user_id' => $user_id,
                'cart_id' => $cart->id,
                'product_id' => $cart->product->id,
                'total_price' => $cart->total_price,
                'quantity' => $cart->quantity,
            ]);
        }
        $orders = Order::with(['cart.user', 'cart.product'])->get();
        return view('order', ['orders' => $orders]);
    }

    public function orderReceived($order_id) {
        $order = Order::find($order_id);
        $order->status = 'received';
        $order->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function manageorders() {
        return view('manage-orders', ['orders' => Order::all()]);
    }
}
