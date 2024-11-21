    <?php
        include("database.php");
        // Query untuk fetch profile pic
        $stmtUser = $conn->prepare('SELECT profilepic FROM users WHERE id = ?');
        $stmtUser->bind_param('i', $_SESSION['user_id']);
        $stmtUser->execute();
        $stmtUser->bind_result($userResult);
        $stmtUser->fetch();
    ?>
    
    <!-- Header -->
    <header class="main-header">
        <div class="container">
            <a href="index.php" class="main-logo">
                <h1 class="logo">Dalel Shop</h1>
            </a>
            <div class="profile-container">
                <div class="profile-box">
                    <?php if($userResult != NULL): ?>
                        <img src="<?= $userResult ?>"><?= $_SESSION['username']?>
                    <?php elseif(isset($_SESSION['loggedin']) == true && $userResult == NULL): ?>
                        <img src="assets/png/anonim.png"><?= $_SESSION['username']?>
                    <?php else: ?>
                        <img src="assets/png/anonim.png">
                    <?php endif; ?>
                </div>
                <div class="dropdown">
                    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                        <div class="dropdown-menu">
                            <a href="profile.php">
                                <i class="fa-solid fa-user"></i>
                                <?= $_SESSION['username'] ?>
                            </a>
                        </div>
                        <div class="dropdown-menu">
                            <a href="manage-product.php">
                                <i class="fa-solid fa-box"></i>
                                Kelola Produk
                            </a>
                        </div>
                        <div class="dropdown-menu">
                            <a href="logout.php">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Keluar
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="dropdown-menu">
                            <a href="login.php">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Login
                            </a>
                        </div>
                        <div class="dropdown-menu">
                            <a href="register.php">
                                <i class="fa-solid fa-address-card"></i>
                                Register
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>