<?php
    include("database.php");
    require __DIR__ . "/vendor/autoload.php";
    $client = new Google\Client;
    $client->setClientId("936119187508-cekbhul2fjml4438lhs0c8nduin0thdl.apps.googleusercontent.com");
    $client->setClientSecret("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");
    $client->setRedirectUri("http://localhost/UTSPPW/redirect.php");

    $client->addScope("email");
    $client->addScope("profile");
    if(!isset($_GET["code"])) {
        exit("Login failed");
    }
    $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
    $client->setAccessToken($token["access_token"]);
    $oauth = new Google\Service\Oauth2($client);
    $userinfo = $oauth->userinfo->get();
    var_dump(
        $userinfo->name,
        $userinfo->email
    );
    $sql = "INSERT INTO users (username, email, is_seller) VALUES ('$userinfo->name', '$userinfo->email', '0')";
    mysqli_query($conn, $sql);
    header("Location: index.php");
    exit();
    mysqli_close($conn);
?>