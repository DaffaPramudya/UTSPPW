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


        <!-- Grid Produk -->
        <div class="product-grid">
            <div class="product-item">
                <div class="product-image">
                    <img src="uploads/" alt="">
                </div>
                <div class="product-name"></div>
                <div class="product-price"></div>
                <form method="POST" action="">
                    <input type="hidden" name="product_id" value="">
                    <button type="submit" name="add_to_cart" class="buy-button">Add to cart</button>
                </form>
            </div>
        </div>

    </div>
    <a href="cart.php"><button class="cart-button"><i class="fa-solid fa-cart-shopping"></i></button></a>
</body>

</html>
