<?php
session_start();
include("database.php");
include("database2.php");

// Ambil ID user dari session
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil kata kunci pencarian jika ada
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query untuk mengambil produk milik user yang sedang login dan sesuai kata kunci pencarian
$sql = "SELECT * FROM produk WHERE id = ? AND (namaProduk LIKE ? OR hargaProduk LIKE ?)";
$stmt = $conn->prepare($sql);
$search_param = "%" . $search . "%";
$stmt->bind_param("iss", $user_id, $search_param, $search_param);
$stmt->execute();
$res = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<title>Dalel Shop - Edit Produk</title>
<body>
<?php include "header.php"; ?>
    <main class="main-table">
        <div class="header"><h1>Edit Daftar Produk</h1></div>
        
        <!-- Form Pencarian -->
        <form method="GET" action="edit-product.php">
            <div class="search-edit">
                <input type="text" name="search" id="search" placeholder="Cari produk" value="<?php echo htmlspecialchars($search); ?>">
                <input type="submit" value="Cari">
            </div>
        </form>
        
        <!-- Form untuk Menyimpan Perubahan -->
        <form action="update_product.php" method="POST" enctype="multipart/form-data">
            <div class="table-body">
                <table>
                    <tr class="head">
                        <td>Info Produk</td>
                        <td>Harga</td>
                        <td>Stok</td>
                        <td></td>
                    </tr>
                    <?php while ($row = $res->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <img src="uploads/<?php echo $row['fotoProduk']; ?>" alt="Produk" width="50">
                                <input type="file" name="fotoProduk[<?php echo $row['idProduk']; ?>]" accept="image/png, image/jpg, image/jpeg">
                                <input type="text" name="namaProduk[<?php echo $row['idProduk']; ?>]" value="<?php echo $row['namaProduk']; ?>" placeholder="Nama Produk" required>
                            </td>
                            <td><input type="text" name="hargaProduk[<?php echo $row['idProduk']; ?>]" value="<?php echo $row['hargaProduk']; ?>" placeholder="Harga Produk" required></td>
                            <td><input type="text" name="stokProduk[<?php echo $row['idProduk']; ?>]" value="<?php echo $row['stokProduk']; ?>" placeholder="Stok Produk" required></td>
                            <td class="edit">
                                <button type="submit" formaction="delete_product.php" name="delete" value="<?php echo $row['idProduk']; ?>">Hapus</button>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="save-changes">
                <input type="submit" value="Simpan Perubahan">
            </div>
        </form>
    </main>
</body>
</html>
