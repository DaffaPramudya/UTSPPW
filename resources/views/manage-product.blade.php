@extends('components.layout')
@section('title', 'Product')
@section('content')
  <h1 class="text-center mt-8 font-semibold text-3xl">Daftar Produk</h1>

  <div class="container mt-4 mx-auto">
    <a href="#">
      <div class="p-4 bg-white border inline-block rounded-lg mb-2 hover:bg-gray-100 transition-colors">
        Tambah Produk
      </div>
    </a>
    <div class="overflow-scroll rounded-lg hidden md:block">
      <table class="w-full">
        <thead class="bg-gray-100 border-b-2 border-gray-300">
          <tr>
            <th class="w-20 p-3 tracking-wide text-left">No.</th>
            <th class="p-3 tracking-wide text-left">Detail</th>
            <th class="w-28 p-3 tracking-wide text-left">Kategori</th>
            <th class="w-28 p-3 tracking-wide text-left">Tanggal</th>
            <th class="w-28 p-3 tracking-wide text-left">Harga</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-300">
          {{-- foreach here --}}
          <tr>
            <td class="p-3 text-gray-500 font-semibold whitespace-nowrap"><a href=""><span class="text-blue-500 hover:text-blue-600 transition-colors">Nomor</span></a></td>
            <td class="p-3 text-gray-500 font-semibold flex items-center whitespace-nowrap"><img src="storage/profile-images/anonim.png" class="h-10 w-10 mr-4">Lorem ipsum dolor sit</td>
            <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">Kategori</td>
            <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">Tanggal</td>
            <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">Harga</td>
          </tr>
          <tr>
            <td class="p-3 text-gray-500 font-semibold whitespace-nowrap"><a href=""><span class="text-blue-500 hover:text-blue-600 transition-colors">Nomor</span></a></td>
            <td class="p-3 text-gray-500 font-semibold flex items-center whitespace-nowrap"><img src="storage/profile-images/anonim.png" class="h-10 w-10 mr-4">Lorem ipsum dolor sit</td>
            <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">Kategori</td>
            <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">Tanggal</td>
            <td class="p-3 text-gray-500 font-semibold whitespace-nowrap">Harga</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
      <div class="flex bg-gray-200 bg-opacity-70 rounded-lg shadow-md p-4 w-full">
        <div class="flex flex-1 flex-col space-y-1">
          <div class="flex space-x-4">
            <div>Nombor</div>
            <div>Date</div>
          </div>
          <div>Detail</div>
          <div>Kategori</div>
          <div>Harga</div>
        </div>
        <div class="flex w-1/4 items-center justify-center">
          <img src="storage/profile-images/anonim.png" class="w-14 h-14">
        </div>
      </div>
      <div class="flex bg-gray-200 bg-opacity-70 rounded-lg shadow-md p-4 w-full">
        <div class="flex flex-1 flex-col space-y-1">
          <div class="flex space-x-4">
            <div>Nombor</div>
            <div>Date</div>
          </div>
          <div>Detail</div>
          <div>Kategori</div>
          <div>Harga</div>
        </div>
        <div class="flex w-1/4 items-center justify-center">
          <img src="storage/profile-images/anonim.png" class="w-14 h-14">
        </div>
      </div>
      <div class="flex bg-gray-200 bg-opacity-70 rounded-lg shadow-md p-4 w-full">
        <div class="flex flex-1 flex-col space-y-1">
          <div class="flex space-x-4">
            <div>Nombor</div>
            <div>Date</div>
          </div>
          <div>Detail</div>
          <div>Kategori</div>
          <div>Harga</div>
        </div>
        <div class="flex w-1/4 items-center justify-center">
          <img src="storage/profile-images/anonim.png" class="w-14 h-14">
        </div>
      </div>
      <div class="flex bg-gray-200 bg-opacity-70 rounded-lg shadow-md p-4 w-full">
        <div class="flex flex-1 flex-col space-y-1">
          <div class="flex space-x-4">
            <div>Nombor</div>
            <div>Date</div>
          </div>
          <div>Detail</div>
          <div>Kategori</div>
          <div>Harga</div>
        </div>
        <div class="flex w-1/4 items-center justify-center">
          <img src="storage/profile-images/anonim.png" class="w-14 h-14">
        </div>
      </div>
    </div>
  </div>
@endsection
