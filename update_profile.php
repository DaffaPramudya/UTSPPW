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

nomor Update query
$sql = "UPDATE users SET username = ?, email = ?, nomor = ?, alamat = ?, gender = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $username, $email, $nomor, $alamat, $gender, $user_id);

nomor Execute the query
if ($stmt->execute()) {
    header("Location: profile.php");
} else {
    echo "Error updating profile: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
