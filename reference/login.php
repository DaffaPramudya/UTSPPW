<?php
session_start();

$error = '';  // Variable to store error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($_SESSION['users'][$email])) {
        $stored_password = $_SESSION['users'][$email]['password'];

        if (password_verify($password, $stored_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $_SESSION['users'][$email]['name'];
            header("Location: welcome.php");
            exit;
        } else {
            $error = "Invalid email or password!";
        }
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css?<?php echo time(); ?>" /> <!-- Link to external stylesheet -->
</head>

<body>
    <!-- Header section -->
    <header class="main-header">
        <div class="container">
            <h1 class="logo">Dapa Web</h1>
            <nav>
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <!-- Main form section -->
    <div class="form-container">
        <form action="login.php" method="post">
            <h2>Login</h2>
            <p>Don't have an account? <a href="register.php">Register</a></p>
            <br>
            <!-- Error message display -->
            <?php if (!empty($error)) : ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="input-group">
                <label for="email" class="form-label required">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="input-group">
                <label for="password" class="form-label required">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    <div class="copyrightbar">
        <p id="copyright">Copyright ©2024 Daffa Pramudya Ismanto</p>
    </div>
</body>
</html>