<?php
session_start();
require __DIR__ . "/vendor/autoload.php";

$client = new Google\Client;
$client->setClientId("1025587847152-otmido7hlfsek8qeeo2h1kt1d2od9l3t.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("http://localhost/dalelshop/redirect.php");

$client->addScope("email");
$client->addScope("profile");

$url = $client->createAuthUrl();

// Database connection
include("database.php");

// Check if the CAPTCHA answer is set, if not generate it
if (!isset($_SESSION['captcha_answer'])) {
    $number1 = rand(1, 10);
    $number2 = rand(1, 10);
    $_SESSION['captcha_answer'] = $number1 + $number2;
    $_SESSION['captcha_question'] = "$number1 + $number2 = ?";
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: profile.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_email = filter_input(INPUT_POST, "username_email", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $user_answer = (int)trim($_POST['captcha']);
    $correct_answer = $_SESSION['captcha_answer'];

    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username_email, $username_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            if ($user_answer === $correct_answer) {
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];

                unset($_SESSION['captcha_answer'], $_SESSION['captcha_question']);

                header("Location: index.php");
                exit();
            } else {
                $error = "Captcha salah!";
            }
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username / email tidak ditemukan!";
    }

    // Regenerate CAPTCHA
    $number1 = rand(1, 10);
    $number2 = rand(1, 10);
    $_SESSION['captcha_answer'] = $number1 + $number2;
    $_SESSION['captcha_question'] = "$number1 + $number2 = ?";

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<title>Dalel Shop - Login</title>

<body>
    <?php include "header.php"; ?>
    <div class="reg-login-body">
        <div class="main-container">
            <div class="left-section">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <p>Login</p>
                    <!-- Error message display -->
                    <?php if (!empty($error)) : ?>
                        <br>
                        <div class="error-message"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <div class="textinput">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username_email" placeholder="Username atau Email" required>
                    </div>
                    <div class="textinput">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <a href="<?= $url ?>" class="googleauth">
                        <div class="google-container">
                            <div class="google-button">Login dengan google</div>
                            <i class="fa-brands fa-google"></i>
                        </div>
                    </a>
                    <p id="captcha-question">Berapakah hasil: <?php echo $_SESSION['captcha_question']; ?></p>
                    <div class="textinput" style="margin-top: 5px;">
                        <input type="text" name="captcha" placeholder="Hasil" required>
                    </div>
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