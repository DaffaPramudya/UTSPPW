<?php
session_start();
include("database.php");

if (isset($_POST['cart_id']) && isset($_SESSION['user_id'])) {
    $cart_id = $_POST['cart_id'];
    $user_id = $_SESSION['user_id'];

    // Hapus produk dari keranjang
    $sql = "DELETE FROM cart WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cart_id, $user_id);
    $stmt->execute();
}

header("Location: cart.php");
exit();
?>
