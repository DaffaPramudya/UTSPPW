<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (isset($_SESSION['users'][$email])) {
        $error = "Email is already registered!";
    } else {
        $_SESSION['users'][$email] = [
            'name' => $name,
            'password' => $password
        ];
        echo "Registration successful!";
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <form action="register.php" method="post">
            <h2>Register</h2>
            <p>Already have an account? <a href="login.php">Login</a></p>
            <br>
            <?php if (isset($error)): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            <br>
            <div class="input-group">
                <label for="name" class="form-label required">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="input-group">
                <label for="email" class="form-label required">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="input-group">
                <label for="password" class="form-label required">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Register</button>

        </form>
    </div>
    <div class="copyrightbar">
        <p id="copyright">Copyright ©2024 Daffa Pramudya Ismanto</p>
    </div>
</body>

</html>