<?php
session_start();
include("database.php");
include("database2.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: index.php");
    exit;
}

$res = all_table($conn, "produk");
?>

<!DOCTYPE html>
<html lang="en">
<?php
include "head.php";
?>
<title>Dalel Shop - Kelola Produk</title>

<body>
    <?php
    include "header.php";
    ?>
    <main class="main-table">
        <div class="header">
            <h1>Kelola Produk</h1>
        </div>
        <div class="add-product">
            <span id="header-add">Tambah Produk Baru</span>
            <form action="funcproduk.php" method="post" enctype="multipart/form-data">
                <input type="text" name="enter-product" id="enter-product" placeholder="Nama Produk" required>
                <input type="text" name="enter-product" id="enter-product" placeholder="Harga Produk" required>
                <input type="text" name="enter-product" id="enter-product" placeholder="Stok Produk" required>
                <input type="file" name="enter-product" accept="image/png, image/jpg, image/jpeg" id="enter-image" placeholder="Nama Produk" required>
                <input type="button" value="+ Tambah Produk" id="add">
            </form>
        </div>
        <div class="search-edit">
            <input type="text" name="search" id="search" placeholder="cari produk">
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
                <?php foreach ($res as $row) { ?>
                    <tr>
                        <td class="info-produk"><img src="uploads/<?php echo $row['fotoProduk']; ?>" alt=""><?php echo $row['namaProduk']; ?></td>
                        <td>Rp785.000,00</td>
                        <td>999</td>
                        <!-- <td class="edit"><input type="button" value="Edit"></td> -->
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>
</body>

</html>