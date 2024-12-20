@extends('components.layout')
@section('title', 'Add Product')
@section('content')
  <h1 class="text-center text-2xl mt-8 font-semibold">Tambah Produk</h1>
  <h2></h2>
  <div class="container mx-auto my-6 lg:max-w-screen-md px-4">
    @if (session()->has('success'))
      <div class="text-center py-3 mb-6 rounded-lg bg-green-400 text-green-900">{{ session('success') }}</div>
    @endif
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="flex items-center justify-center md:hidden mb-6 w-full flex-1">
        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
          <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
          </div>
          <input id="dropzone-file" type="file" class="hidden" />
        </label>
      </div>
      <div class="flex w-full gap-4 flex-1">
        <div class="flex flex-col w-full md:w-1/2">
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
            <input type="text" name="name" id="default-input" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
            <input type="number" name="price" value="{{ old('price') }}" id="default-input" style="-moz-appearance: textfield;" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
            <input type="number" value="1" name="stock" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
            <select name="category" id="default" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option selected disabled>Pilih jenis sepatu</option>
              <option value="Sepatu Lari" @if (old('category') == 'Sepatu Lari') selected @endif>Sepatu Lari</option>
              <option value="Sepatu Sneakers" @if (old('category') == 'Sepatu Sneakers') selected @endif>Sepatu Sneakers</option>
              <option value="Sepatu Formal" @if (old('category') == 'Sepatu Formal') selected @endif>Sepatu Formal</option>
              <option value="Sepatu Boots" @if (old('category') == 'Sepatu Boots') selected @endif>Sepatu Boots</option>
              <option value="Sepatu Loafers" @if (old('category') == 'Sepatu Loafers') selected @endif>Sepatu Loafers</option>
            </select>
          </div>
        </div>

        <div class="md:flex items-center justify-center w-full flex-1 hidden">
          <label for="pictures[]" class="h-full flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
              <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
              </svg>
              <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
              <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            </div>
            <input id="pictures[]" name="pictures[]" type="file" class="hidden" multiple />
          </label>
        </div>

      </div>
      <div class="mb-6">
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
        <input type="text" name="description" id="large-input" value="{{ old('description') }}" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-5002">
      </div>
      <div class="flex justify-center">
        <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800 w-72">
          <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white overflow-hidden dark:bg-gray-900 rounded-md group-hover:bg-opacity-0 w-full">
            Upload Produk
          </span>
        </button>
      </div>
    </form>
  </div>
@endsection
