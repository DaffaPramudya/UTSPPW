<!DOCTYPE html>
<html lang="en">

<x-head></x-head>
<title>Dalel Shop - Register</title>

<body>
    <x-navbar></x-navbar>
    <div class="reg-login-body">
        <div class="main-container">
            <div class="left-section">
                <form action="/register" method="post">
                    @csrf
                    <p>Register</p>
                    <!-- Error message display -->
                    @if ($errors->any())
                        <div class="error-message">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <div class="textinput">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                    </div>
                    <div class="textinput">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
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
                <p class="center-text">Sudah punya akun? <a href="login.php" class="reg-login-link">Login</a></p>
            </div>
            <div class="loginillus">
                <img src="svg/undraw_join_re_w1lh.svg" height="250px">
            </div>
        </div>
    </div>
</body>

</html>
