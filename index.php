<?php session_start(); 
    include("database.php");
    include("database2.php");
    $res = all_table($conn, "produk");
?>

<!DOCTYPE html>
<html lang="id">
<?php
include "head.php";
?>
<title>Dalel Shop - Home</title>

<body class="index-body">

    <?php
    include "header.php";
    ?>

    <!-- Container Utama -->
    <div class="container">

        <!-- Pencarian Produk -->
        <div class="search-bar">
            <input type="text" placeholder="Cari produk...">
        </div>

        <!-- Grid Produk -->
        <div class="product-grid">
            <?php foreach ($res as $row) { 
                $harga = $row['hargaProduk'];
                $harga = number_format($harga, 0, ',', '.');
                ?>
                <div class="product-item">
                    <div class="product-image" style="background-color: #ddd; width: 100%; height: 150px;">
                        <img src="uploads/<?php echo $row['fotoProduk']; ?>" alt="">
                    </div>
                    <div class="product-name"><?php echo $row['namaProduk']; ?></div>
                    <div class="product-price">Rp<?php echo $harga; ?></div>
                    <button class="buy-button">Add to cart</button>
                </div>
            <?php } ?>
            <!-- 
            <div class="product-item">
                <div class="product-image" style="background-color: #ddd; width: 100%; height: 150px;"></div>
                <div class="product-name">Produk 2</div>
                <div class="product-price">Rp 200.000</div>
                <button class="buy-button">Beli</button>
            </div>

            <div class="product-item">
                <div class="product-image" style="background-color: #ddd; width: 100%; height: 150px;"></div>
                <div class="product-name">Produk 3</div>
                <div class="product-price">Rp 150.000</div>
                <button class="buy-button">Beli</button>
            </div>

            <div class="product-item">
                <div class="product-image" style="background-color: #ddd; width: 100%; height: 150px;"></div>
                <div class="product-name">Produk 4</div>
                <div class="product-price">Rp 250.000</div>
                <button class="buy-button">Beli</button>
            </div>

            <div class="product-item">
                <div class="product-image" style="background-color: #ddd; width: 100%; height: 150px;"></div>
                <div class="product-name">Produk 5</div>
                <div class="product-price">Rp 120.000</div>
                <button class="buy-button">Beli</button>
            </div>

            <div class="product-item">
                <div class="product-image" style="background-color: #ddd; width: 100%; height: 150px;"></div>
                <div class="product-name">Produk 6</div>
                <div class="product-price">Rp 180.000</div>
                <button class="buy-button">Beli</button>
            </div>

            <div class="product-item">
                <div class="product-image" style="background-color: #ddd; width: 100%; height: 150px;"></div>
                <div class="product-name">Produk 7</div>
                <div class="product-price">Rp 300.000</div>
                <button class="buy-button">Beli</button>
            </div>

            <div class="product-item">
                <div class="product-image" style="background-color: #ddd; width: 100%; height: 150px;"></div>
                <div class="product-name">Produk 8</div>
                <div class="product-price">Rp 220.000</div>
                <button class="buy-button">Beli</button>
            </div>

            <div class="product-item">
                <div class="product-image" style="background-color: #ddd; width: 100%; height: 150px;"></div>
                <div class="product-name">Produk 9</div>
                <div class="product-price">Rp 320.000</div>
                <button class="buy-button">Beli</button>
            </div>

            <div class="product-item">
                <div class="product-image" style="background-color: #ddd; width: 100%; height: 150px;"></div>
                <div class="product-name">Produk 10</div>
                <div class="product-price">Rp 280.000</div>
                <button class="buy-button">Beli</button>
            </div>  -->
        </div>

    </div>

</body>

</html>