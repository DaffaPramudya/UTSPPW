@extends('components.layout')
@section('title', 'Cart')
@section('content')

  <body>
    @if (session()->has('success'))
      <div class="success-message" style="padding: 1rem; margin: 20px">
        {{ session('success') }}
      </div>
    @elseif (session()->has('error'))
      <div class="error-message" style="padding: 1rem; margin: 20px">
        {{ session('error') }}
      </div>
    @endif
    
    <div class="pt-5 px-7 text-center">
      <h1 class="font-bold text-xl">Keranjang</h1>
    </div>

    <div class="container mx-auto md:px-6 my-5 flex items-start">
      <div class="relative shadow-md sm:rounded-lg overflow-x-auto w-2/3">
        <table class="w-full h-auto text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-800 uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">Produk</th>
              <th scope="col" class="px-6 py-3">Harga</th>
              <th scope="col" class="px-6 py-3">Jumlah</th>
              <th scope="col" class="px-6 py-3">Total</th>
            </tr>
          </thead>
          @foreach ($carts as $cart)
            <tbody>
              <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white flex items-center w-72 overflow-hidden whitespace-normal">
                  @if ($cart->product->picture)
                    <img class="size-16 mr-2" src="/storage/{{ $cart->product->picture }}" alt="">
                  @else
                    <img class="size-16 mr-2" src="/storage/no-image.svg">
                  @endif
                  <span>{{ $cart->product->name }}</span>
                </th>
                <td class="px-6 py-4">{{ $cart->product->price }}</td>
                <td class="px-6 py-4">
                  <div class="flex items-center space-x-2">
                    <!-- Minus Button -->
                    <form action="/carts/sub/{{ $cart->id }}" method="POST" class="flex">
                      @csrf
                      <button type="submit" name="decrease" class="size-5 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-200 text-sm">
                        <i class="fa-solid fa-minus"></i>
                      </button>
                    </form>

                    <!-- Quantity Input -->
                    <form action="/carts/{{ $cart->id }}" method="POST" class="flex">
                      @csrf
                      @method('put')
                      <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" class="w-8 h-8 text-center border-2 border-gray-400 rounded focus:outline-none" readonly>
                    </form>

                    <!-- Plus Button -->
                    <form action="/carts/add/{{ $cart->id }}" method="POST" class="flex">
                      @csrf
                      <button type="submit" name="increase" class="size-5 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-200 text-sm">
                        <i class="fa-solid fa-plus"></i>
                      </button>
                    </form>
                  </div>
                </td>
                <td class="px-6 py-4">{{ $cart->product->price * $cart->quantity }}</td>
                <td class="px-6 py-4">
                  <form action="/carts/{{ $cart->id }}" method="POST" style="text-align: center;">
                    @csrf
                    @method('delete')
                    <button type="submit" id="hapusproduk"><i class="fa-solid fa-trash text-red-600"></i></button>
                  </form>
                </td>
              </tr>
            </tbody>
          @endforeach
        </table>
      </div>

      <div class="border border-slate-600 w-1/3 ml-5 rounded-lg bg-blue-100 flex-shrink-0 max-h-72">
        <h1 class="p-2 text-center font-semibold">Ringkasan Belanja</h1>
        <div class="p-8 border border-y-slate-600">
          <div class="flex justify-between">
            <p>Total</p>
            <p>Rp200.000</p>
          </div>
          <div class="flex justify-between">
            <p>Ongkos Kirim</p>
            <p>Gratis</p>
          </div>
        </div>
        <div class="px-8 py-5">
          <div class="flex justify-between font-semibold">
            <p>Total</p>
            <p>Rp200.000</p>
          </div>
          <div class="flex justify-center">
            <input type="submit" value="Beli" class="mt-4 border rounded-lg w-full py-2 bg-blue-600 hover:bg-blue-800 transition-colors text-white font-semibold cursor-pointer">
          </div>
        </div>
      </div>
    </div>
  </body>
@endsection