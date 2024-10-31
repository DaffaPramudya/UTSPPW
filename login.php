<?php

require __DIR__ . "/vendor/autoload.php";
$client = new Google\Client;
$client->setClientId("936119187508-cekbhul2fjml4438lhs0c8nduin0thdl.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://localhost/dalelshop/redirect.php");

$client->addScope("email");
$client->addScope("profile");

$url = $client->createAuthUrl();

session_start();
include("database.php");
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: profile.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_email = filter_input(INPUT_POST, "username_email", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username_email, $username_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            // Set session login
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];

            // Redirect ke halaman utama
            header("Location: index.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username / email tidak ditemukan!";
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include "head.php";
?>
<title>Dalel Shop - Login</title>
<body>
<?php
    include "header.php";
?>
    <div class="reg-login-body">
        <div class="main-container">
            <div class="left-section">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <p>Login</p>
                    <!-- Error message display -->
                    <?php if (!empty($error)) : ?>
                        <br>
                        <div class="error-message"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <div class="textinput">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username_email" placeholder="Username atau Email">
                    </div>
                    <div class="textinput">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <a href="<?= $url?>" class="googleauth">
                        <div class="google-container">
                            <div class="google-button">Login dengan google</div>
                            <i class="fa-brands fa-google"></i>
                        </div>
                    </a>
                    <input type="submit" value="Login" class="submit-btn">
                </form>
                <p class="center-text">Belum punya akun? <a href="register.php" class="reg-login-link">Register</a></p>
            </div>
            <div class="loginillus">
                <img src="assets/svg/undraw_login_re_4vu2.svg" height="200px">
            </div>
        </div>
    </div>
</body>

</html>