<?php
session_start();
include("database.php");
require __DIR__ . "/vendor/autoload.php";

$client = new Google\Client;
$client->setClientId("1025587847152-otmido7hlfsek8qeeo2h1kt1d2od9l3t.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://localhost/dalelshop/redirect.php");

// Menambahkan `prompt` untuk memaksa Google menampilkan pilihan akun
$client->setPrompt('select_account');
$client->addScope("email");
$client->addScope("profile");

if (!isset($_GET["code"])) {
    exit("Login failed");
}

// Mendapatkan token akses
$token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
$client->setAccessToken($token["access_token"]);
$oauth = new Google\Service\Oauth2($client);
$userinfo = $oauth->userinfo->get();

// Cek apakah username atau email sudah ada di database
$username = $userinfo->name;
$email = $userinfo->email;
$sql = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    // Pengguna sudah ada, ambil user_id dari database
    $user = mysqli_fetch_assoc($result);
    $user_id = $user['id'];
} else {
    // Pengguna belum ada, tambahkan ke database
    $sql_insert = "INSERT INTO users (username, email, is_seller) VALUES (?, ?, '0')";
    $stmt_insert = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "ss", $username, $email);
    mysqli_stmt_execute($stmt_insert);

    // Ambil user_id dari pengguna baru
    $user_id = mysqli_insert_id($conn);
}

// Set session dengan user_id dan data lainnya
$_SESSION['loggedin'] = true;
$_SESSION['user_id'] = $user_id;
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;

// Redirect ke halaman utama
header("Location: index.php");
exit();

mysqli_close($conn);
?>
