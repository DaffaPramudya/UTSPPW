<!DOCTYPE html>
<html lang="en">
<x-head></x-head>
<title>Dalel Shop - Login</title>

<body>
    <x-navbar></x-navbar>
    <div class="reg-login-body">
        <div class="main-container">
            <div class="left-section">
                <form action="/login" method="post">
                    @csrf
                    <p>Login</p>
                    @if (session()->has('success'))
                        <div class="success-message">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('loginError'))
                        <div class="error-message">
                            {{ session('loginError') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="error-message">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <div class="textinput">
                        <i class="fa-solid fa-user"></i>
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    </div>
                    <div class="textinput">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <a href="" class="googleauth">
                        <div class="google-container">
                            <div class="google-button">Login dengan google</div>
                            <i class="fa-brands fa-google"></i>
                        </div>
                    </a>
                    <p id="captcha-question">Berapakah hasil: {{session('captcha_num1')}} + {{session('captcha_num2')}}</p>
                    <div class="textinput" style="margin-top: 5px;">
                        <input type="text" name="captcha" placeholder="Hasil">
                    </div>
                    <input type="submit" value="Login" class="submit-btn">
                </form>
                <p class="center-text">Belum punya akun? <a href="/register" class="reg-login-link">Register</a></p>
            </div>
            <div class="loginillus">
                <img src="svg/undraw_login_re_4vu2.svg" height="200px">
            </div>
        </div>
    </div>
</body>

</html>
