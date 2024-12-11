<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dalel Shop - Home</title>
    <x-head></x-head>
    <style></style>
</head>

<body class="index-body">
    <x-navbar></x-navbar>

    <!-- Container Utama -->
    <div class="container">

        <!-- Pencarian Produk -->
        <div class="search-bar">
            <form method="GET" action="index.php" id="search-form">
                <input type="text" name="search" placeholder="Cari produk..." class="search-bar-index"
                    value="">
                <input type="submit" value="Cari" id="save" class="submit-btn-index">
            </form>
        </div>

        @if(session()->has('success'))
            <div class="success-message">
                {{session('success')}}
            </div>
        @elseif(session()->has('error'))
            <div class="error-message">
                {{session('error')}}
            </div>
        @endif

        <!-- Grid Produk -->
        <div class="product-grid">
            @foreach($products as $product)
            <div class="product-item">
                <div class="product-image">
                    @if($product->picture)
                        <img src="storage/{{$product->picture}}" alt="" style="object-fit: cover">
                    @else
                        <img src="storage/product-images/no-image.svg" style="object-fit: contain">
                    @endif
                </div>
                <div class="product-name">{{$product->name}}</div>
                <div class="product-price">{{$product->price}}</div>
                <form action="/carts/{{$product->id}}" method="POST">
                    @csrf
                    <button type="submit" name="add_to_cart" class="buy-button">Add to cart</button>
                </form>
            </div>
            @endforeach
        </div>

    </div>

    <form action="/carts" method="get">
        <button class="cart-button"><i class="fa-solid fa-cart-shopping"></i>
    </form>
</body>

</html>
