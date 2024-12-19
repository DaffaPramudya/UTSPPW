@extends('components.layout')
@section('title', 'Edit Product')
@section('content')
  @php
    $pictures = json_decode($product->pictures, true);
  @endphp

  <h1 class="text-center text-2xl mt-8 font-semibold">Ubah Produk</h1>
  <div class="container mx-auto my-6 lg:max-w-screen-md px-4">
    @if (session()->has('success'))
      <div class="text-center py-3 mb-6 rounded-lg bg-green-400 text-green-900">{{ session('success') }}</div>
    @endif

    <div id="controls-carousel" class="relative w-full mb-6" data-carousel="static">
      <!-- Carousel wrapper -->
      <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <!-- Item 1 -->
        @if (empty($pictures))
          <img src="{{ asset('storage/product-images/no-image.svg') }}" class="h-full mx-auto">
        @endif
        @foreach ($pictures as $index => $picture)
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('storage/' . $picture) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            <div class="absolute bottom-4 right-1/2 translate-x-1/2">
              <form action="/deleteImage/{{ $product->code }}/{{ $index }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition z-50">
                  <i class="fa-solid fa-trash text-white mr-2"></i> Hapus Foto
                </button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
      <!-- Slider controls -->
      @if (!empty($pictures))
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
      @endif
    </div>

    <form action="{{ route('products.update', $product->code) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="flex w-full gap-4 flex-1">
        <div class="flex flex-col w-full">
          <div class="mb-6">
            <div class="flex space-x-4">
              <label for="default-input" class="inline-block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
              @error('name')
                <div class="inline-block w-full">
                  <div class="flex items-center text-sm text-red-800 rounded-lg" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  </div>
                </div>
              @enderror
            </div>
            <input type="text" name="name" id="default-input" value="{{ old('name', $product->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
          <div class="mb-6">
            <div class="flex space-x-4">
              <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
              @error('price')
                <div class="inline-block w-full">
                  <div class="flex items-center text-sm text-red-800 rounded-lg" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  </div>
                </div>
              @enderror
            </div>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" id="default-input" style="-moz-appearance: textfield;" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
          <div class="mb-6">
            <div class="flex space-x-4">
              <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
              @error('stock')
                <div class="inline-block w-full">
                  <div class="flex items-center text-sm text-red-800 rounded-lg" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  </div>
                </div>
              @enderror
            </div>
            <input type="number" value="{{ old('stock', $product->stock) }}" name="stock" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
          <div class="mb-6">
            <div class="flex space-x-4 justify-between">
              <label for="default" class="whitespace-nowrap block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Kategori</label>
              @error('category')
                <div class="inline-block w-full">
                  <div class="flex items-center text-sm text-red-800 rounded-lg" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                      <span class="font-medium">{{ $message }}</span>
                    </div>
                  </div>
                </div>
              @enderror
            </div>
            <select name="category" id="default" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option selected disabled>Pilih jenis sepatu</option>
              <option value="Sepatu Lari" @if (old('category', $product->category) == 'Sepatu Lari') selected @endif>Sepatu Lari</option>
              <option value="Sepatu Sneakers" @if (old('category', $product->category) == 'Sepatu Sneakers') selected @endif>Sepatu Sneakers</option>
              <option value="Sepatu Formal" @if (old('category', $product->category) == 'Sepatu Formal') selected @endif>Sepatu Formal</option>
              <option value="Sepatu Boots" @if (old('category', $product->category) == 'Sepatu Boots') selected @endif>Sepatu Boots</option>
              <option value="Sepatu Loafers" @if (old('category', $product->category) == 'Sepatu Loafers') selected @endif>Sepatu Loafers</option>
            </select>
          </div>
        </div>


      </div>
      <div class="mb-4">
        <div class="flex space-x-4 justify-between">
          <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Produk</label>
          @error('description')
            <div class="inline-block w-full">
              <div class="flex items-center text-sm text-red-800 rounded-lg" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  <span class="font-medium">{{ $message }}</span>
                </div>
              </div>
            </div>
          @enderror
        </div>
        <input type="text" name="description" id="large-input" value="{{ $product->description }}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-5002">
      </div>

      <div class="mb-8">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload gambar produk</label>
        <input name="pictures[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple>
      </div>

      <div class="flex justify-center">
        <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800 w-72">
          <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white overflow-hidden dark:bg-gray-900 rounded-md group-hover:bg-opacity-0 w-full">
            Ubah Produk
          </span>
        </button>
      </div>
    </form>
  </div>
@endsection
