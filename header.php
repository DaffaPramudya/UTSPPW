    <!-- Header -->
    <header class="main-header">
        <div class="container">
            <a href="index.php" class="main-logo">
                <h1 class="logo">Dalel Shop</h1>
            </a>
            <nav class="main-header-contents">
                <ul>
                    <!--
                        <li><a href="login.php" class="main-header-link">Login</a></li>
                        <li><a href="register.php" class="main-header-link">Register</a></li> -->
                    <li>
                        <div class="main-header-profile-button">
                            <input type="checkbox" id="menuToggle">
                            <label for="menuToggle" class="menu-button">
                                <i class="fa-solid fa-user"></i>
                                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) : ?>
                                    <h2 class="main-header-welcome"><?php echo $_SESSION['username']; ?></h2>
                                <?php endif; ?>
                            </label>
                            <div class="menu-dropdown">
                                <ul>
                                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) : ?>
                                        <li><a href="profile.php">Profile</a></li>
                                        <li><a href="manage-product.php">Kelola Produk</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    <?php else : ?>
                                        <li><a href="login.php">Login</a></li>
                                        <li><a href="register.php">Register</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>