@extends('components.layout')
@section('title', 'Orders')
@section('content')
  <div class="container mt-8 p-4 xs:p-2 mx-auto">
    <h1 class="text-3xl pb-6 px-5 lg:px-0">Pesanan Saya</h1>
    <div class="overflow-scroll rounded-lg hidden lg:block">
      <table class="w-full">
        <thead class="bg-gray-100 border-b-2 border-gray-300">
          <tr>
            <th class="w-24 p-3 tracking-wide text-left">Kode</th>
            <th class="p-3 tracking-wide text-left">Detail</th>
            <th class="w-28 p-3 tracking-wide text-left"></th>
            <th class="w-28 p-3 tracking-wide text-left">Pembayaran</th>
            <th class="w-28 p-3 tracking-wide text-left">Pengiriman</th>
            <th class="w-28 p-3 tracking-wide text-left">Status</th>
            <th class="w-28 p-3 tracking-wide text-left">Ukuran</th>
            <th class="w-28 p-3 tracking-wide text-left">Kuantitas</th>
            <th class="w-36 p-3 tracking-wide text-left">Total Harga</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-300">
          {{-- foreach here --}}
          @foreach ($orders as $order)
            @php
              $pictures = json_decode($order->product->pictures, true);
            @endphp
            <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
              <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">
                {{ $order->product->code }}
              </td>
              <td class="p-3 text-gray-500 flex items-center font-semibold whitespace-nowrap overflow-scroll">
                @if (!empty($pictures))
                  <img src="{{ asset('storage/' . $pictures[0]) }}" class="h-16 w-16 mr-4 object-cover rounded-md">{{ $order->product->name }}
                @else
                  <img src="storage/product-images/no-image.svg" class="h-16 w-16 mr-4 object-cover rounded-md">{{ $order->product->name }}
                @endif
              </td>
              <td class="p-3 text-gray-500 font-semibold whitespace-nowrap text-center">
                <form action="{{ route('received', $order->id) }}" method="POST">
                  @csrf
                  <button class="size-8 bg-green-300 rounded-md hover:bg-green-400 transition-all">
                    <i class="fa-solid fa-check text-white"></i>
                  </button>
                </form>
              </td>
              <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">
                {{ $order->payment }}
              </td>
              <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">
                {{ $order->shipment }}
              </td>
              <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">
                @if ($order->status == 'delivered')
                  <div class="p-3 bg-yellow-300 text-center bg-opacity-80 text-white rounded-md cursor-default">
                    Dikirim
                  </div>
                @else
                  <div class="p-3 bg-green-300 text-center bg-opacity-80 text-white rounded-md cursor-default">
                    Diterima
                  </div>
                @endif
              </td>
              <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">
                {{ $order->size }}
              </td>
              <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">
                {{ $order->quantity }}
              </td>
              <td class="p-3 text-gray-500 font-semibold whitespace-nowrap tracking-wide">
                Rp {{ number_format($order->total_price, 0, ',', '.') }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="grid lg:hidden gap-4 px-5">
      <!-- Card Item -->
      @foreach ($orders as $order)
        <div class="flex bg-gray-200 bg-opacity-70 rounded-lg shadow-md p-4 w-full">
          <div class="flex flex-1 flex-col space-y-1">
            <div class="font-semibold">{{ $order->product->name }} <a href="{{ route('products.show', $order->product->code) }}"><span class="text-blue-500 hover:text-blue-600 ml-2">{{ $order->product->code }}</span></a></span></div>
            <div>Pembayaran: {{ $order->payment }}</div>
            <div>Pengiriman: {{ $order->shipment }}</div>
            <div>Kuantitas: {{ $order->quantity }}</div>
            <div>Ukuran: {{ $order->size }}</div>
            <div>Total Harga: <span class="font-semibold">Rp {{ number_format($order->product->price, 0, ',', '.') }}</span></div>
            <br><br><br><br>
            @if ($order->status == 'delivered')
              <div class="p-3 bg-yellow-300 text-center bg-opacity-80 text-white rounded-md cursor-default mt-4">
                Dikirim
              </div>
            @else
              <div class="p-3 bg-green-300 text-center bg-opacity-80 text-white rounded-md cursor-default mt-4">
                Diterima
              </div>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection
