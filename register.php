<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Dalel Shop - Register</title>
</head>
<body class="reg-login-body">
    <div class="main-container">
        <div class="left-section">
            <form action="register.php" method="post">
                <p>Register</p>
                <div class="textinput">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>
                <div class="textinput">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email">
                </div>
                <div class="textinput">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <input type="submit" value="Register" class="submit-btn">
            </form>
            <p>Sudah punya akun? <a href="login.php" class="reg-login-link">Login</a></p>
        </div>
        <div class="loginillus">
            <img src="assets/svg/undraw_join_re_w1lh.svg" height="250px">
        </div>
    </div>
    
</body>
</html>