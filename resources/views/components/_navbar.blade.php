<!-- Header -->
<header class="main-header">
    <div class="container">
        <a href="index.php" class="main-logo">
            <h1 class="logo">Dalel Shop</h1>
        </a>
        <div class="profile-container">
            <div class="profile-box">
                @auth
                    @if (auth()->user()->profilepic)
                        <img src="storage/{{ auth()->user()->profilepic }}"> {{ auth()->user()->username }}
                    @else
                        <img src="storage/app/profile-images/default.jpg"> {{ auth()->user()->username }}
                    @endif
                @else
                    <img src="storage/app/profile-images/default.jpg"> Login yuk!
                @endauth
            </div>
            <div class="dropdown">
                @auth
                    <div class="dropdown-menu">
                        <a href="/profile">
                            <i class="fa-solid fa-user"></i>
                            {{ auth()->user()->username }}
                        </a>
                    </div>
                    @if (auth()->user()->is_admin)
                        <div class="dropdown-menu">
                            <a href="/manage-product">
                                <i class="fa-solid fa-box"></i>
                                Kelola Produk
                            </a>
                        </div>
                    @endif
                    <div class="dropdown-menu">
                        <form action="/logout">
                            <button type="submit">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Keluar
                            </button>
                        </form>
                    </div>
                @else
                    <div class="dropdown-menu">
                        <a href="/login">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Login
                        </a>
                    </div>
                    <div class="dropdown-menu">
                        <a href="/register">
                            <i class="fa-solid fa-address-card"></i>
                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>
