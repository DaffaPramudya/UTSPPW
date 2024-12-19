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
          <img src="{{ asset('img/carousel/1.png') }}" class="h-full w-full object-cover object-center absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
          <img src="{{ asset('img/carousel/2.png') }}" class="h-full w-full object-cover object-center absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
          <img src="{{ asset('img/carousel/3.png') }}" class="h-full w-full object-cover object-center absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
          <img src="{{ asset('img/carousel/4.png') }}" class="h-full w-full object-cover object-center absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{ asset('img/carousel/5.png') }}" class="h-full w-full object-cover object-center absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
      </div>
      <!-- Slider indicators -->
      <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
      </div>
      <!-- Slider controls -->
      <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>

    <!-- Card Produk SEMENTARA YA GES -->
    <div class=" pb-5 pt-5">
      <h1 class="font-bold text-xl">Produk Rekomendasi</h1>
    </div>
    <div class="grid grid-cols-1 xs:grid-cols-2 sm:flex sm:flex-wrap gap-4">
      <!-- Card Item -->
      <div class=" bg-white border border-gray-200 rounded-lg shadow-sm md:h-80 md:w-50">
        <a href="#">
          <img class="rounded-t-lg object-cover h-48 w-full" src="https://via.placeholder.com/300" alt="Sepatu Putih" />
        </a>
        <div class="p-4">
          <!-- Caption -->
          <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900">Sepatu putih</h5>

          <!-- Harga -->
          <p class="text-gray-700 mb-3">Rp200.000</p>

          <!-- Actions -->
          <div class="flex justify-between items-center">
            <!-- Wishlist -->
            @auth
              @if (!auth()->user()->is_admin)
                <button type="button" class="text-gray-500 hover:text-red-500">
                  <i class="far fa-heart"></i> <!-- FontAwesome icon -->
                </button>
                <!-- Cart Button -->
                <button type="button" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                  <i class="fas fa-shopping-cart"></i> <!-- FontAwesome icon -->
                </button>
              @endif
            @endauth
          </div>
        </div>
      </div>
    </div>
@endsection
