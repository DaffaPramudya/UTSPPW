<?php
session_start();
include("database.php");
include("database2.php");

// Ambil kata kunci pencarian jika ada
$search = isset($_GET['search']) ? $_GET['search'] : null;

// Ambil produk yang sesuai dengan pencarian
$res = all_table_alluser($conn, "produk", $search);

// Tambahkan produk ke keranjang
if (isset($_POST['add_to_cart'])) {
    $user_id = $_SESSION['user_id']; // Pastikan user_id tersimpan di sesi
    $product_id = $_POST['product_id'];
    $quantity = 1;

    // Query untuk menambahkan produk ke tabel cart
    $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE quantity = quantity + 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $user_id, $product_id, $quantity);
    $stmt->execute();
}

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
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="<?php echo $row['idProduk']; ?>">
                        <button type="submit" name="add_to_cart" class="buy-button">Add to cart</button>
                    </form>
                </div>
            <?php } ?>
        </div>

    </div>
</body>
<?php include "cartbutton.php"; ?>

</html>