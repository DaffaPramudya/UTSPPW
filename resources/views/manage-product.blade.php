@extends('components.layout')
@section('title', 'Product')
@section('content')
  <h1 class="text-center mt-8 font-semibold text-3xl">Daftar Produk</h1>

  <div class="container mt-4 p-4 xs:p-2 mx-auto">
    @if (session()->has('success'))
      <div class="mx-auto max-w-80 text-center py-3 mb-6 rounded-lg bg-green-300 text-green-900">{{ session('success') }}</div>
    @endif
    <a href="/products/create" class="px-4 py-3 bg-white border inline-block rounded-lg mb-4 hover:bg-gray-100 transition-colors shadow-md">
      Tambah Produk
    </a>
    <div class="overflow-scroll rounded-lg hidden md:block">
      <table class="w-full">
        <thead class="bg-gray-100 border-b-2 border-gray-300">
          <tr>
            <th class="w-24 p-3 tracking-wide text-left">Kode</th>
            <th class="p-3 tracking-wide text-left">Detail</th>
            <th class="w-28 p-3 tracking-wide text-left"></th>
            <th class="w-28 p-3 tracking-wide text-left">Kategori</th>
            <th class="w-28 p-3 tracking-wide text-left">Stok</th>
            <th class="w-28 p-3 tracking-wide text-left">Harga</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-300">
          {{-- foreach here --}}
          @foreach ($products as $product)
            @php
              $pictures = json_decode($product->pictures, true);
            @endphp
            <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
              <td class="p-3 text-gray-500 font-semibold whitespace-nowrap"><a href=""><span class="text-blue-500 hover:text-blue-600 transition-colors">{{ $product->code }}</span></a></td>
              <td class="p-3 text-gray-500 font-semibold flex items-center whitespace-nowrap overflow-scroll">
                @if (!empty($pictures))
                  <img src="storage/{{ $pictures[0] }}" class="h-16 w-16 mr-4 object-cover rounded-md">{{ $product->name }}
                @else
                  <img src="storage/product-images/no-image.svg" class="h-16 w-16 mr-4 object-cover rounded-md">{{ $product->name }}
                @endif
              </td>
              <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">
                <div class="flex space-x-2">
                  <form action="{{ route('products.destroy', $product->code) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="flex justify-center items-center w-9 h-9 rounded-lg bg-red-600 hover:bg-red-700 transition-colors">
                      <i class="fa-solid fa-trash text-white"></i>
                    </button>
                  </form>
                  <a href="{{ route('products.edit', $product->code) }}" class="flex justify-center items-center w-9 h-9 rounded-lg bg-yellow-300 hover:bg-yellow-400 transition-colors">
                    <i class="fa-solid fa-pen-to-square text-white"></i>
                  </a>
                </div>
              </td>
              <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">{{ $product->category }}</td>
              <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">{{ $product->stock }}</td>
              @if ($product->discount != 0)
                <td class="p-4 text-gray-500 font-semibold whitespace-nowrap">
                  <div class="p-3 bg-green-500 text-white rounded-md">
                    <i class="fa-solid fa-tag text-white mr-2"></i>Rp {{ number_format($product->price * ((100 - $product->discount) * 0.01), 0, ',', '.') }}
                  </div>
                </td>
              @else
                <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
      @foreach ($products as $product)
        @php
          $pictures = json_decode($product->pictures, true);
        @endphp
        <div class="flex bg-gray-200 bg-opacity-70 rounded-lg shadow-md p-4 w-full">
          <div class="flex flex-1 flex-col space-y-1">
            <div class="font-semibold">{{ $product->name }}</div>
            <div>Stok: {{ $product->stock }}</div>
            <div>Kategori: {{ $product->category }}</div>
            @if ($product->discount != 0)
              <div>
                Harga: <p class="text-green-700 inline">Rp: {{ number_format($product->price * ((100 - $product->discount) * 0.01), 0, ',', '.') }}</p>
                <div class="mt-2 p-2 bg-green-500 text-white rounded-md inline-block text-xs">
                  <i class="fa-solid fa-tag text-white mr-2"></i>{{ $product->discount . ' %' }}
                </div>
              </div>
            @else
              <div>Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</div>
            @endif
          </div>
          <div class="flex w-1/4 items-center justify-center">
            @if (!empty($pictures))
              <img src="storage/{{ $pictures[0] }}" class="h-24 w-24 sm:h-16 sm:w-16 mr-4 object-cover rounded-md">
            @else
              <img src="storage/product-images/no-image.svg" class="h-24 w-24 sm:h-16 sm:w-16 mr-4 object-cover rounded-md">
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
