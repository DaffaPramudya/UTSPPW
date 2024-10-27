<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/register.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <div class="main-container">
        <div class="left-section">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <p>Register</p>
                <div class="textinput">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="textinput">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="textinput" style="margin-bottom: 20px;">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="checkbox-wrapper">
                    <input type="checkbox" name="isseller" value="1">
                    <label for="isseller">Daftar sebagai seller</label>
                </div>
                <input type="submit" value="Register" class="submit-btn">
            </form>
            <p>Sudah punya akun? <a href="login.php" class="login-link">Login</a></p>
        </div>
        <div class="right-section">
            <img src="assets/svg/undraw_join_re_w1lh.svg" height="250px">
        </div>
    </div>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $isseller = isset($_POST['isseller']) ? 1 : 0;
        if(empty($username)) {
            echo "Masukkan username!";
        }
        elseif(empty($email)) {
            echo "Masukkan email!";
        }
        elseif(empty($password)) {
            echo "Masukkan password!";
        }
        else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password, is_seller) VALUES ('$username', '$email', '$hash', '$isseller')";
            mysqli_query($conn, $sql);
            header("Location: login.php");
        }
    }
    myqsli_close($conn);
?>