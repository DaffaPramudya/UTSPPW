<?php
    session_start();
    include("database.php");
    require __DIR__ . "/vendor/autoload.php";
    $client = new Google\Client;
    $client->setClientId("936119187508-tongo08ma09fj09q0rlm9ojnh6mc448j.apps.googleusercontent.com");
    $client->setClientSecret("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");
    $client->setRedirectUri("http://localhost/UTSPPW2/redirect.php");

    $client->addScope("email");
    $client->addScope("profile");
    if(!isset($_GET["code"])) {
        exit("Login failed");
    }
    $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
    $client->setAccessToken($token["access_token"]);
    $oauth = new Google\Service\Oauth2($client);
    $userinfo = $oauth->userinfo->get();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $userinfo->name;
    $sql = "INSERT INTO users (username, email, is_seller) VALUES ('$userinfo->name', '$userinfo->email', '0')";
    mysqli_query($conn, $sql);
    header("Location: index.php");
    exit();
    mysqli_close($conn);
?>