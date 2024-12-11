@extends('components.layout')
@section('title', 'Dashboard')
@section('content')
<!-- Container Utama -->
<div class="container mx-auto my-10 px-32">

  <!-- Pencarian Produk -->
  <!-- <div class="search-bar">
    <form method="GET" action="index.php" id="search-form">
      <input type="text" name="search" placeholder="Cari produk..." class="search-bar-index" value="">
      <input type="submit" value="Cari" id="save" class="submit-btn-index">
    </form>
  </div>

  @if (session()->has('success'))
    <div class="success-message">
      {{ session('success') }}
    </div>
  @elseif(session()->has('error'))
    <div class="error-message">
      {{ session('error') }}
    </div>
  @endif -->

  <!-- Grid Produk -->
    <div class=" pb-5"><h1 class="font-bold text-xl">Produk Rekomendasi</h1></div>
    
    <div class="grid grid-cols-4 gap-6">
    @foreach ($products as $product)
      <div class="border rounded-lg  w-48 h-72 ">
          <!-- image product -->
          <div class=" ">
            @if ($product->picture)
              <img src="storage/{{ $product->picture }}" alt="" class="w-48 h-44 border rounded-lg">
            @else
              <img src="storage/product-images/no-image.svg" class="w-48 h-44 border rounded-lg">
            @endif
          </div>

          <!-- product name and price -->
          <div class="p-4">
            <h4 class=" font-semibold text-base mb-2 text-black">{{ $product->name }}</h4>
              <div class="flex items-center mt-6 space-x-2 justify-between">
                <p class="text-sm text-black font-semibold">{{ $product->price }}</p>
                <form action="/carts/{{ $product->id }}" method="POST">
                  @csrf
                  <button type="submit" name="add_to_cart">
                    <i class="fa-solid fa-cart-shopping text-sm bg-blue-500 text-white hover:text-blue-500 hover:bg-white p-2 border rounded-md"></i>
                  </button>
                </form>
                <!-- <button type="submit" name="add_to_cart ">
                    <i class="fa-solid fa-cart-shopping text-sm bg-blue-500 text-white hover:text-blue-500 hover:bg-white p-2 border rounded-md"></i>
                </button> -->
              </div>
          </div>
      </div>
    @endforeach
    </div>
  <!-- <div class="product-grid">
    @foreach ($products as $product)
      <div class="product-item">
        <div class="product-image">
          @if ($product->picture)
            <img src="storage/{{ $product->picture }}" alt="" style="object-fit: cover">
          @else
            <img src="storage/product-images/no-image.svg" style="object-fit: contain">
          @endif
        </div>
        <div class="product-name">{{ $product->name }}</div>
        <div class="product-price">{{ $product->price }}</div>
        <form action="/carts/{{ $product->id }}" method="POST">
          @csrf
          <button type="submit" name="add_to_cart" class="buy-button">Add to cart</button>
        </form>
      </div>
    @endforeach
  </div> -->
</div>

<!-- <form action="/carts" method="get">
  <button class="cart-button"><i class="fa-solid fa-cart-shopping"></i>
</form> -->
@endsection