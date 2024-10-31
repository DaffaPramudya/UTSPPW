<?php 
session_start();
include("database.php");
include("database2.php");

// Ambil kata kunci pencarian jika ada
$search = isset($_GET['search']) ? $_GET['search'] : null;

// Ambil produk yang sesuai dengan pencarian
$res = all_table_alluser($conn, "produk", $search);
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
            <form method="GET" action="index.php">
                <input type="text" name="search" placeholder="Cari produk..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                <input type="submit" value="Cari" id="save">
            </form>
        </div>


        <!-- Grid Produk -->
        <div class="product-grid">
            <?php foreach ($res as $row) {
                $harga = $row['hargaProduk'];
                $harga = number_format($harga, 0, ',', '.');
            ?>
                <div class="product-item">
                    <div class="product-image">
                        <img src="uploads/<?php echo $row['fotoProduk']; ?>" alt="">
                    </div>
                    <div class="product-name"><?php echo $row['namaProduk']; ?></div>
                    <div class="product-price">Rp<?php echo $harga; ?></div>
                    <button class="buy-button">Add to cart</button>
                </div>
            <?php } ?>
        </div>

    </div>
</body>
<?php include "cartbutton.php"; ?>

</html>