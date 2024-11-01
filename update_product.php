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

// Loop melalui semua produk yang di-submit
foreach ($_POST['namaProduk'] as $idProduk => $namaProduk) {
    $hargaProduk = $_POST['hargaProduk'][$idProduk];
    $stokProduk = $_POST['stokProduk'][$idProduk];

    // Proses upload foto jika ada
    if (isset($_FILES['fotoProduk']['name'][$idProduk]) && $_FILES['fotoProduk']['name'][$idProduk] != '') {
        $file = $_FILES['fotoProduk'];
        $fileName = $file['name'][$idProduk];
        $fileTmpName = $file['tmp_name'][$idProduk];
        $fileError = $file['error'][$idProduk];
        
        // Ekstensi file
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = "Produk_" . $idProduk . "." . $fileExt; // Nama baru dengan prefix Produk_
        $fileDestination = 'uploads/' . $newFileName;

        // Pindahkan file yang di-upload
        if ($fileError === 0) {
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                // Update database dengan nama file yang baru
                $sql = "UPDATE produk SET namaProduk = ?, hargaProduk = ?, stokProduk = ?, fotoProduk = ? WHERE idProduk = ? AND id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("siisii", $namaProduk, $hargaProduk, $stokProduk, $newFileName, $idProduk, $user_id);
                $stmt->execute();
            } else {
                echo "Gagal meng-upload file untuk produk ID $idProduk.";
            }
        } else {
            echo "Terjadi kesalahan saat meng-upload file untuk produk ID $idProduk.";
        }
    } else {
        // Jika tidak ada file baru yang diunggah, hanya update data selain foto
        $sql = "UPDATE produk SET namaProduk = ?, hargaProduk = ?, stokProduk = ? WHERE idProduk = ? AND id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siiii", $namaProduk, $hargaProduk, $stokProduk, $idProduk, $user_id);
        $stmt->execute();
    }
}

// Redirect kembali ke halaman edit produk setelah update
header("Location: edit-product.php");
exit();
?>
