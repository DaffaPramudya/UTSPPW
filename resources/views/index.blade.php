@extends('components.layout')
@section('title', 'Dashboard')
@section('content')
  <!-- Container Utama -->
  <div class="container mx-auto px-4 py-8 sm:my-10 sm:px-14">

    <div id="default-carousel" class="relative w-full" data-carousel="slide">
      <!-- Carousel wrapper -->
      <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
          <img src="{{ asset('img/carousel/1.png') }}"
            class="h-full w-full object-cover object-center absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
            alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
          <img src="{{ asset('img/carousel/2.png') }}"
            class="h-full w-full object-cover object-center absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
            alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
          <img src="{{ asset('img/carousel/3.png') }}"
            class="h-full w-full object-cover object-center absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
            alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
          <img src="{{ asset('img/carousel/4.png') }}"
            class="h-full w-full object-cover object-center absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
            alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ asset('img/carousel/5.png') }}"
            class="h-full w-full object-cover object-center absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
            alt="...">
        </div>
      </div>
      <!-- Slider indicators -->
      <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
          data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
          data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
          data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
          data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
          data-carousel-slide-to="4"></button>
      </div>
      <!-- Slider controls -->
      <button type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
          class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 1 1 5l4 4" />
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
          class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 9 4-4-4-4" />
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>
    <!-- Search Query Display -->
    @if (!empty($search))
      <div class="my-6 p-4 bg-gray-100 border border-gray-300 rounded-md">
        <h2 class="text-lg font-semibold text-gray-800">Hasil pencarian untuk:</h2>
        <p class="text-gray-600 mt-2">{{ $search }}</p>
      </div>
    @endif
    <!-- Product Card -->
    <div class=" pb-5 pt-5">
      <h1 class="font-bold text-xl">Semua Produk</h1>
    </div>
    @if (session()->has('success'))
      <div class="text-center p-3 mb-6 rounded-lg bg-green-400 text-green-900 lg:w-1/2 mx-auto">{{ session('success') }}
      </div>
    @elseif(session()->has('error'))
      <div class="text-center p-3 mb-6 rounded-lg bg-red-400 text-red-900 lg:w-1/2 mx-auto">{{ session('error') }}</div>
    @endif
    <div class="grid grid-cols-1 xs:grid-cols-2 lg:grid-cols-4 gap-4">
      <!-- Card Item -->
      @foreach ($products as $product)
        @php
          $pictures = json_decode($product->pictures, true);
        @endphp
        <div class=" bg-white border border-gray-200 rounded-lg shadow-sm flex flex-col justify-between">
          <a href="{{ route('products.show', $product->code) }}">
            @if (!empty($pictures[0]))
              <img class="rounded-t-lg object-cover h-48 w-full" src="{{ asset('storage/' . $pictures[0]) }}" />
            @else
              <div class="h-48 flex justify-center items-center">
                <img class="rounded-t-lg object-cover w-1/2" src="{{ asset('storage/product-images/no-image.svg') }}" />
              </div>
            @endif
          </a>
          <!-- Caption -->
          <div class="mx-4 mt-4">
            <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900">{{ $product->name }}</h5>

            <!-- Harga -->
            @if ($product->discount != 0)
              <p class="text-red-700 line-through inline-block">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
              <div class="ml-2 p-2 bg-green-500 text-white rounded-md inline-block text-xs">
                <i class="fa-solid fa-tag text-white mr-2"></i>{{ $product->discount . ' %' }}
              </div>
              <p class="text-green-700 mb-3 font-semibold">Rp
                {{ number_format($product->price * ((100 - $product->discount) * 0.01), 0, ',', '.') }}</p>
            @else
              <p class="text-gray-700 mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            @endif
          </div>

          <!-- Actions -->
          <div class="flex justify-between items-center mb-4 mx-4">
            <!-- Wishlist -->
            @auth
              @if (!auth()->user()->is_admin)
                <form action="{{ route('addwishlist', $product->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="text-gray-500 hover:text-red-500 transition-colors">
                    <i class="far fa-heart"></i>
                  </button>
                </form>
                <!-- Cart Button -->
                <form action="{{ route('addcart', $product->id) }}" method="POST">
                  @csrf
                  <button type="submit"
                    class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition-colors">
                    <i class="fas fa-shopping-cart"></i>
                  </button>
                </form>
              @endif
            @endauth
          </div>
        </div>
      @endforeach
      <div class="mt-4">
        {{ $products->links() }} {{-- Pagination links --}}
      </div>
    </div>
  @endsection
