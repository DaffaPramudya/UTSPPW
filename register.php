<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $isseller = isset($_POST['isseller']) ? 1 : 0;

    // Check if fields are empty
    if (empty($username)) {
        $error = "Masukkan username!";
    } elseif (empty($email)) {
        $error = "Masukkan email!";
    } elseif (empty($password)) {
        $error = "Masukkan password!";
    } else {
        // Check if the username or email already exists in the database
        $check_sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($result) > 0) {
            // Fetch result to determine which field is duplicated
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] == $username) {
                $error = "Username sudah terdaftar!";
            } elseif ($row['email'] == $email) {
                $error = "Email sudah terdaftar!";
            }
        } else {
            // Hash the password and insert the new user
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password, is_seller) VALUES ('$username', '$email', '$hash', '$isseller')";
            mysqli_query($conn, $sql);
            header("Location: login.php");
            exit();
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<?php
    include "head.php";
?>
<title>Dalel Shop - Register</title>
<body>
<?php
    include "header.php";
?>
<div class="reg-login-body">
    <div class="main-container">
        <div class="left-section">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <p>Register</p>
                <!-- Error message display -->
                <?php if (!empty($error)): ?>
                    <br>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
                <div class="textinput">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="textinput">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="textinput">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="checkbox-wrapper">
                    <input type="checkbox" name="isseller" value="1">
                    <label for="isseller">Daftar sebagai seller</label>
                </div>
                <input type="submit" value="Register" class="submit-btn">
            </form>
            <p>Sudah punya akun? <a href="login.php" class="reg-login-link">Login</a></p>
        </div>
        <div class="loginillus">
            <img src="assets/svg/undraw_join_re_w1lh.svg" height="250px">
        </div>
    </div>
</div>
</body>
</html>