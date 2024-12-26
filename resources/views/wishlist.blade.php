@extends('components.layout')
@section('title', 'Wishlist')
@section('content')
  <div class="container mx-auto mt-8 px-4">
    <h1 class="pb-6 px-5 text-3xl">Wishlist</h1>
    @if (session()->has('success'))
      <div class="text-center p-3 mb-6 rounded-lg bg-green-300 text-green-900 w-1/2 mx-auto">{{ session('success') }}</div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 px-5">
      <!-- Card Item -->
      @foreach ($wishlists as $wishlist)
        @php
          $pictures = json_decode($wishlist->product->pictures, true);
        @endphp
        <div class=" bg-white border border-gray-200 rounded-lg shadow-sm flex flex-col justify-between">
          <a href="{{ route('products.show', $wishlist->product->code) }}">
            @if (!empty($pictures[0]))
              <img class="rounded-t-lg object-cover h-48 w-full" src="{{ asset('storage/' . $pictures[0]) }}" />
            @else
              <div class="h-48 flex justify-center items-center">
                <img class="rounded-t-lg object-cover w-1/2" src="{{ asset('storage/product-images/no-image.svg') }}" />
              </div>
            @endif
          </a>
          <!-- Caption -->
          <div class="mx-4 mt-4 flex">
            <div>
              <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900">{{ $wishlist->product->name }}</h5>
              <!-- Harga -->
              @if ($wishlist->product->discount != 0)
                <p class="text-red-700 line-through inline-block">Rp {{ number_format($wishlist->product->price, 0, ',', '.') }}</p>
                <div class="ml-2 p-2 bg-green-500 text-white rounded-md inline-block text-xs">
                  <i class="fa-solid fa-tag text-white mr-2"></i>{{ $wishlist->product->discount . ' %' }}
                </div>
                <p class="text-green-700 mb-3 font-semibold">Rp {{ number_format($wishlist->product->price * ((100 - $wishlist->product->discount) * 0.01), 0, ',', '.') }}</p>
              @else
                <p class="text-gray-700 mb-3">Rp {{ number_format($wishlist->product->price, 0, ',', '.') }}</p>
              @endif
            </div>
            <div class="ml-auto">
              <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST" class="inline-block">
                @csrf
                @method('delete')
                <button type="submit" class="flex justify-center items-center w-9 h-9 rounded-lg bg-red-600 hover:bg-red-700 transition-colors">
                  <i class="fa-solid fa-trash text-white"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  </div>
@endsection
