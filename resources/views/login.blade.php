<!DOCTYPE html>
<html lang="en">
<x-head></x-head>
<title>Dalel Shop - Login</title>

<body class="bg-blue-600 mx-auto">
    <div class="grid grid-cols-2 border rounded-lg mx-36 my-12 p-10 bg-white">
        <div class="py-14 px-20 border shadow-lg rounded-lg ">
            <form action="/login" method="post">
                @csrf
                <p class="text-2xl font-semibold mb-4 text-center">Login</p>
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
                <!-- email -->
                <div class="border px-2 py-1 mb-2 rounded-lg">
                    <i class="fa-solid fa-user size-5"></i>
                    <input class="p-1 text-sm focus:outline-none" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>

                <!-- password -->
                <div class="border px-2 py-1 rounded-lg">
                    <i class="fa-solid fa-lock size-5"></i>
                    <input  class="p-1 text-sm focus:outline-none" type="password" name="password" placeholder="Password" required>
                </div>

                <!-- google -->
                <a href="" class="googleauth">
                    <div class="flex items-center mt-6">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="px-2 text-gray-500 flex text-sm">or continue with </span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>

                    <div class="flex justify-center mt-2 mb-4">
                        <img src="{{ asset('svg/google.svg') }}" alt="" class="border rounded-lg px-16 py-2 text-center h-10">
                        <!-- <i class="fa-brands fa-google border rounded-lg px-16 py-2  text-center"></i> -->
                    </div>
                </a>

                <p id="captcha-question" class="text-sm mb-1">Berapakah hasil: {{session('captcha_num1')}} + {{session('captcha_num2')}}</p>
                <div class="border rounded-lg px-2 py-1">
                    <input type="text" name="captcha" placeholder="Hasil" class="focus:outline-none">
                </div>

                <div class="mt-4 mb-1 border rounded-lg w-40 justify-self-center py-2 flex items-center justify-center bg-blue-600 text-white font-semibold cursor-pointer">
                    <input type="submit" value="Login" class="cursor-pointer">
                </div>

                
            </form>
            <p class="flex items-center justify-center text-sm">Belum punya akun? <a href="/register" class="ml-0.5 underline font-semibold"> Register</a></p>
        </div>

        <div class="relative justify-items-center items-center py-28 ">
            <img src="svg/undraw_login_re_4vu2.svg" class="h-52 items-center">
        </div>
    </div>
    
</body>

</html>
