<?php
session_start();
include("database.php");

if (isset($_POST['cart_id']) && isset($_SESSION['user_id'])) {
    $cart_id = $_POST['cart_id'];
    $user_id = $_SESSION['user_id'];

    // Query untuk mendapatkan jumlah produk saat ini di keranjang
    $sql = "SELECT quantity FROM cart WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cart_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if ($row) {
        $current_quantity = $row['quantity'];

        // Update jumlah produk
        if (isset($_POST['increase'])) {
            $sql = "UPDATE cart SET quantity = quantity + 1 WHERE id = ? AND user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $cart_id, $user_id);
            $stmt->execute();
        } elseif (isset($_POST['decrease']) && $current_quantity > 1) {
            $sql = "UPDATE cart SET quantity = quantity - 1 WHERE id = ? AND user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $cart_id, $user_id);
            $stmt->execute();
        }
    }
}

header("Location: cart.php");
exit();
?>
