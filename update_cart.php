<?php
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cart_id = $_POST['cart_id'];
    $change = isset($_POST['increase']) ? 1 : (isset($_POST['decrease']) ? -1 : 0);
    
    // Fetch current quantity
    $sql = "SELECT quantity FROM cart WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $current_quantity = $row['quantity'];

    // Update quantity
    $new_quantity = max(1, $current_quantity + $change); // Ensure quantity doesn't go below 1
    $sql = "UPDATE cart SET quantity = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $new_quantity, $cart_id);
    $stmt->execute();

    // Redirect back to the cart page
    header("Location: cart.php");
    exit();
}
?>
