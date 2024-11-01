<?php
session_start();
include("database.php");

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Get form data
$username = $_POST['username'];
$email = $_POST['email'];
$nomor = $_POST['nomor'];
$alamat = $_POST['alamat'];
$gender = $_POST['gender'];

// Update query
$sql = "UPDATE users SET username = ?, email = ?, nomor = ?, alamat = ?, gender = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $username, $email, $nomor, $alamat, $gender, $user_id);

// Execute the query
if ($stmt->execute()) {
    $_SESSION['username'] = $username;
    header("Location: profile.php");
} else {
    echo "Error updating profile: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
