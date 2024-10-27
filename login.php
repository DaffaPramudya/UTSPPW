<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Dalel Shop - Login</title>
</head>
<body class="reg-login-body">
    <div class="main-container">
        <div class="left-section">
            <form action="login.php" method="post">
                <p>Login</p>
                <div class="textinput">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Username atau Email">
                </div>
                <div class="textinput">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <input type="submit" value="Login" class="submit-btn">
            </form>
            <p>Belum punya akun? <a href="register.php" class="reg-login-link">Register</a></p>
        </div>
        <div class="loginillus">
            <img src="assets/svg/undraw_login_re_4vu2.svg" height="200px">
        </div>
    </div>

</body>
</html>