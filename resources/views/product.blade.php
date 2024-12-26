@extends('components.layout')
@section('title', 'Product')
@section('content')
  <div class="container mx-auto my-8">
    @if (session()->has('success'))
      <div class="text-center p-3 mb-6 rounded-lg bg-green-400 text-green-900 lg:w-1/2 mx-auto">{{ session('success') }}</div>
    @elseif(session()->has('error'))
      <div class="text-center p-3 mb-6 rounded-lg bg-red-400 text-red-900 lg:w-1/2 mx-auto">{{ session('error') }}</div>
    @endif
    <div class="flex flex-col lg:flex-row rounded-md overflow-hidden bg-blue-200">
      <div class="p-8 lg:w-1/2 lg:p-16 lg:pr-0">
        <div id="default-carousel" class="relative w-full" data-carousel="static">
          <!-- Carousel wrapper -->
          <div class="relative h-80 overflow-hidden rounded-md md:h-96">
            @php
              $pictures = json_decode($product->pictures);
            @endphp
            @foreach ($pictures as $picture)
              <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('storage/' . $picture) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
              </div>
            @endforeach
          </div>
          <!-- Slider indicators -->
          <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            @foreach ($pictures as $picture)
              <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            @endforeach
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
      </div>
      <div class="lg:w-1/2 bg-blue-200 p-8 lg:p-16 lg:pb-10 flex flex-col justify-between">
        <div class="h-full flex flex-col justify-between">
          <div>
            <div class="flex justify-between align-bottom lg:mb-0 mb-4">
              <h1 class="text-2xl font-semibold inline mb-4">{{ $product->name }}</h1>
              <div class="flex lg:hidden">
                @if ($product->discount != 0)
                  <h1 class="font-semibold xs:text-4xl align-text-bottom mb-4 text-green-600 text-xl">Rp {{ number_format($product->price * ((100 - $product->discount) * 0.01), 0, ',', '.') }}</h1>
                  <span class="ml-4 line-through text-red-500">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                @else
                  <h1 class="font-semibold text-4xl align-text-bottom mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h1>
                @endif
              </div>
            </div>
            <p class="text-gray-500">{{ $product->description }}</p>
          </div>
          {{-- Shoe size --}}
          <div class="my-7">
            <div class="lg:flex hidden">
              @if ($product->discount != 0)
                <h1 class="font-semibold text-4xl align-text-bottom mb-4 text-green-600">Rp {{ number_format($product->price * ((100 - $product->discount) * 0.01), 0, ',', '.') }}</h1>
                <span class="ml-4 line-through text-red-500">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
              @else
                <h1 class="font-semibold text-4xl align-text-bottom mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h1>
              @endif
            </div>
            <h1 class="mb-2 font-medium">Ukuran sepatu</h1>
            <form action="{{ route('addcartproduct', $product->id) }}" method="POST">
              @csrf
              <div class="flex space-x-4">
                <div>
                  <input type="radio" id="size-37" name="size" value="37" class="hidden peer" required />
                  <label for="size-37" class="inline-flex items-center justify-center size-11 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-500 peer-checked:text-blue-500 peer-checked:font-semibold hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    37
                  </label>
                </div>
                <div>
                  <input type="radio" id="size-38" name="size" value="38" class="hidden peer" required />
                  <label for="size-38" class="inline-flex items-center justify-center size-11 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-500 peer-checked:text-blue-500 peer-checked:font-semibold hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    38
                  </label>
                </div>
                <div>
                  <input type="radio" id="size-39" name="size" value="39" class="hidden peer" required />
                  <label for="size-39" class="inline-flex items-center justify-center size-11 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-500 peer-checked:text-blue-500 peer-checked:font-semibold hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    39
                  </label>
                </div>
                <div>
                  <input type="radio" id="size-40" name="size" value="40" class="hidden peer" required />
                  <label for="size-40" class="inline-flex items-center justify-center size-11 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-500 peer-checked:text-blue-500 peer-checked:font-semibold hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    40
                  </label>
                </div>
                <div>
                  <input type="radio" id="size-41" name="size" value="41" class="hidden peer" required />
                  <label for="size-41" class="inline-flex items-center justify-center size-11 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-500 peer-checked:text-blue-500 peer-checked:font-semibold hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    41
                  </label>
                </div>
                <div>
                  <input type="radio" id="size-42" name="size" value="42" class="hidden peer" required />
                  <label for="size-42" class="inline-flex items-center justify-center size-11 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-500 peer-checked:text-blue-500 peer-checked:font-semibold hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    42
                  </label>
                </div>
                <div>
                  <input type="radio" id="size-43" name="size" value="43" class="hidden peer" required />
                  <label for="size-43" class="inline-flex items-center justify-center size-11 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-500 peer-checked:text-blue-500 peer-checked:font-semibold hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    43
                  </label>
                </div>
              </div>
              <div class="text-center mt-6">
                <button type="submit" class="p-4 bg-blue-500 hover:bg-blue-600 transition-colors rounded-md text-white"><i class="fa-solid fa-cart-shopping mr-2 text-white"></i>Tambah ke keranjang</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>


  </div>
@endsection
