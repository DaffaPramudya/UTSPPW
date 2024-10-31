<?php
include "database.php";
session_start();

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    die("Anda harus login terlebih dahulu.");
}

// Ambil ID user dari session
$user_id = $_SESSION['user_id'];

if (isset($_POST['condition'])) {
    $condition = $_POST['condition'];

    switch ($condition) {
        case "insert":
            // Ambil data produk dari form
            $namaProduk = $_POST['namaProduk'];
            $hargaProduk = $_POST['hargaProduk'];
            $stokProduk = $_POST['stokProduk'];

            // Generate idProduk secara otomatis
            $maxidx = mysqli_query($conn, "SELECT * FROM produk ORDER BY idProduk DESC");
            $row = mysqli_fetch_array($maxidx);
            if (mysqli_num_rows($maxidx) != NULL) {
                $idProduk = $row[0] + 1;
            } else {
                $idProduk = 1;
            }

            // Proses file upload
            $uploadDir = 'uploads/';
            $allowedTypes = ['gif', 'jpg', 'jpeg', 'png'];
            $foto = "Produk_" . $idProduk . "." . pathinfo($_FILES["fotoProduk"]["name"], PATHINFO_EXTENSION);
            $targetFile = $uploadDir . $foto;

            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            if (!in_array($fileType, $allowedTypes)) {
                die("File type not allowed.");
            }

            if ($_FILES["fotoProduk"]["size"] > 4096 * 1024) {
                die("File is too large. Maximum size is 4MB.");
            }

            if (move_uploaded_file($_FILES["fotoProduk"]["tmp_name"], $targetFile)) {
                // Insert data produk ke database
                $query = "INSERT INTO produk (idProduk, namaProduk, fotoProduk, hargaProduk, stokProduk, id) 
                          VALUES ('$idProduk', '$namaProduk', '$foto', '$hargaProduk', '$stokProduk', '$user_id')";
                if (mysqli_query($conn, $query)) {
                    header("location: ../dalelshop/manage-product.php");
                } else {
                    echo "Gagal menambahkan produk: " . mysqli_error($conn);
                }
            } else {
                echo "Gagal mengunggah file.";
            }
            break;
    }
}
?>
