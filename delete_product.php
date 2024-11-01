<?php
session_start();
include("database.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$idProduk = $_POST['delete'];

// Hapus produk dari database
$sql = "DELETE FROM produk WHERE idProduk = ? AND id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $idProduk, $user_id);
$stmt->execute();

header("Location: edit-product.php");
exit();
?>
