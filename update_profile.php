<?php
session_start();
include("database.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$username = $_POST['username'];
$email = $_POST['email'];
$nomor = $_POST['nomor'];
$alamat = $_POST['alamat'];
$gender = $_POST['gender'];

$sql = "UPDATE users SET username = ?, email = ?, nomor = ?, alamat = ?, gender = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $username, $email, $nomor, $alamat, $gender, $user_id);

if ($stmt->execute()) {
    $_SESSION['username'] = $username;
    header("Location: profile.php");
} else {
    echo "Error updating profile: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
