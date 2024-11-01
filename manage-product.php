<?php
session_start();
include("database.php");
include("database2.php");

// Pastikan user sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil kata kunci pencarian jika ada
$search = isset($_GET['search']) ? $_GET['search'] : null;

// Ambil produk yang hanya dimiliki oleh user yang sedang login, dengan filter pencarian nama produk jika ada
$res = all_table($conn, "produk", $user_id, $search);
?>



<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<title>Dalel Shop - Kelola Produk</title>

<body>
    <?php include "header.php"; ?>
    <main class="main-table">
        <div class="header">
            <h1>Kelola Produk</h1>
        </div>
        <div class="add-product">
            <span id="header-add">Tambah Produk Baru</span>
            <form action="funcproduk.php" method="post" enctype="multipart/form-data">
                <input type="text" name="namaProduk" id="enter-product" placeholder="Nama Produk" required>
                <input type="text" name="hargaProduk" id="enter-product" placeholder="Harga Produk (Contoh: 15000)" required>
                <input type="text" name="stokProduk" id="enter-product" placeholder="Stok Produk" required>
                <input type="hidden" name="condition" value="insert" required>
                <label for="fileUpload">Pilih file untuk diunggah:</label>
                <input type="file" name="fotoProduk" accept="image/png, image/jpg, image/jpeg" id="enter-image" placeholder="Nama Produk" required>
                <input type="submit" value="+ Tambah Produk" id="add">
            </form>
        </div>
        <div class="search-edit">
            <form method="GET" action="">
                <input type="text" name="search" id="search" placeholder="Cari produk">
                <input type="submit" value="Cari" id="save">
            </form>
            <form action="edit-product.php">
                <input type="submit" value="Edit produk" id="save">
            </form>
        </div>



        <div class="table-body">
            <table>
                <tr class="head">
                    <td>Info Produk</td>
                    <td>Harga</td>
                    <td>Stok</td>
                </tr>
                <?php foreach ($res as $row) {
                    $harga = $row['hargaProduk'];
                    $harga = number_format($harga, 0, ',', '.');
                ?>
                    <tr>
                        <td class="info-produk"><img src="uploads/<?php echo $row['fotoProduk']; ?>" alt=""><?php echo $row['namaProduk']; ?></td>
                        <td>Rp<?php echo $harga; ?></td>
                        <td><?php echo $row['stokProduk']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </main>
</body>

</html>