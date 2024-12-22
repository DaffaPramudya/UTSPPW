@extends('components.layout')
@section('title', 'Beli')
@section('content')
  <div class="container mx-auto bg-gray-200 bg-opacity-80 lg:max-w-screen-sm rounded-md mt-6">
    <div class="p-12">
      <div class="flex justify-between mb-8">
        <span class="text-4xl font-semibold">Total Belanja:</span>
        @php
          $total_price = App\Models\Cart::where('user_id', auth()->id())->sum('total_price');
        @endphp
        <span class="text-xl tracking-wider">Rp {{number_format($total_price, 0, ',', '.')}}</span>
      </div>
      <h1>Pembayaran</h1>
      <form action="{{route('orders.store')}}" method="POST" class="flex flex-col">
        @csrf
        <select name="payment" class="mb-4 rounded-md">
          <option value="bri">BRI</option>
          <option value="mandiri">Mandiri</option>
          <option value="bca">BCA</option>
          <option value="shopeepay">ShopeePay</option>
          <option value="gopay">GoPay</option>
          <option value="dana">Dana</option>
        </select>
        <h1>Pengiriman</h1>
        <select name="shipment" class="rounded-md">
          <option value="jne">JNE</option>
          <option value="j&t">J&T</option>
          <option value="sicepat">SiCepat</option>
        </select>
        <button type="submit" class="mt-8 shadow-2xl border-black border-2 hover:bg-black hover:text-white transition-all w-40 p-3 rounded-md font-semibold self-center">
          Bayar
        </button>
      </form>
    </div>
  </div>
@endsection
