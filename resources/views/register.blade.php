<!DOCTYPE html>
<html lang="en">

<x-head></x-head>
<title>Dalel Shop - Register</title>

<body class="bg-blue-600 mx-auto">
    <div class="grid grid-cols-2 border rounded-lg mx-36 my-12 p-10 bg-white">
        <div class="relative justify-items-center items-center py-28">
            <img src="svg/undraw_join_re_w1lh.svg" class="h-64 items-center">
        </div>

        <div class="py-14 px-20 border shadow-lg rounded-lg">
            <form action="/register" method="post">
                @csrf
                <p class="text-2xl font-semibold mb-8 text-center">Register</p>
                <!-- Error message display -->
                @if ($errors->any())
                    <div class="error-message">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                <!-- username -->
                <div class="border px-2 py-1 mb-2 rounded-lg">
                    <i class="fa-solid fa-user size-5"></i>
                    <input class="p-1 text-sm focus:outline-none" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
                </div>

                <!-- email -->
                <div class="border px-2 py-1 mb-2 rounded-lg">
                    <i class="fa-solid fa-envelope size-5"></i>
                    <input class="p-1 text-sm focus:outline-none" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>

                <!-- password -->
                <div class="border px-2 py-1 rounded-lg mb-1">
                    <i class="fa-solid fa-lock size-5"></i>
                    <input class="p-1 text-sm focus:outline-none" type="password" name="password" placeholder="Password">
                </div>

                <div class="flex items-center gap-2 px-2">
                    <input type="checkbox" name="isseller" id="isseller" value="1" class="cursor-pointer">
                    <label for="isseller" class="text-sm cursor-pointer">Daftar sebagai seller</label>
                </div>

                <div class="mt-14 mb-1 border rounded-lg w-40 justify-self-center py-2 flex items-center justify-center bg-blue-600 text-white font-semibold cursor-pointer">
                    <input type="submit" value="Register" class="cursor-pointer">
                </div>
                
            </form>

            <p class="flex items-center justify-center text-sm">Sudah punya akun? <a href="/login" class="ml-0.5 underline font-semibold">Login</a></p>
        </div>
    </div>
</body>

</html>
