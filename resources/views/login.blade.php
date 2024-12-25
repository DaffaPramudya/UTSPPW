@extends('components.layout')
@section('title', 'Login')
@section('content')

  <body class="bg-auth-bg bg-cover min-h-screen min-w-screen flex items-center">
    <div class="my-8 mx-auto md:grid md:grid-cols-2 border rounded-lg container px-6 py-10 sm:p-10 bg-white sm:block xl:max-w-screen-lg shadow-lg">
      <div class="p-8 sm:py-14 sm:px-20 border shadow-lg rounded-lg md:p-8">
        <form action="/login" method="post" class="flex flex-col mb-6">
          @csrf
          <p class="text-2xl font-semibold mb-4 text-center cursor-default">Login</p>
          @if (session()->has('success'))
            <div class="text-center py-3 mb-3 w-full mx-auto rounded-lg bg-green-300 text-green-900">
              {{ session('success') }}
            </div>
          @elseif (session()->has('error'))
          <div class="text-center py-3 mb-3 w-full mx-auto rounded-lg bg-red-300 text-red-900">
            {{ session('error') }}
          </div>
          @endif
          <!-- email -->
          <div class="border-solid border py-3 px-3 mb-2 rounded-lg flex items-center overflow-hidden">
            <i class="fa-solid fa-user w-4 h-4 mr-3"></i>
            <input class="border rounded-lg p-3 outline-none text-sm w-full" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
          </div>

          <!-- password -->
          <div class="border-solid border py-3 px-3 rounded-lg flex items-center overflow-hidden">
            <i class="fa-solid fa-lock w-4 h-4 mr-3"></i>
            <input class="border rounded-lg p-3 outline-none text-sm w-full" type="password" name="password" placeholder="Password" required>
          </div>

          <!-- google -->
          <div class="flex items-center mt-6">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="px-2 text-gray-500 flex text-sm cursor-default">or continue with </span>
            <div class="flex-grow border-t border-gray-300"></div>
          </div>
          <div class="flex justify-center mt-2 mb-4">
            <a href="#">
              <img src="{{ asset('svg/google.svg') }}" alt="" class="border rounded-lg px-16 py-2 text-center h-10 hover:bg-slate-100 transition-colors">
            </a>
          </div>

          <p id="captcha-question" class="text-sm mb-1">Berapakah hasil: {{ session('captcha_num1') }} + {{ session('captcha_num2') }}</p>
          <input type="text" name="captcha" placeholder="Hasil" class="border rounded-lg p-3 outline-none text-sm w-40 text-center">
          <input type="submit" value="Login" class="mt-4 border rounded-lg w-full py-2 self-center bg-blue-600 hover:bg-blue-700 transition-colors text-white font-semibold cursor-pointer">

        </form>
        <p class="flex items-center justify-center text-sm">Belum punya akun? <a href="/register" class="ml-0.5 underline font-semibold hover:text-gray-800 transition-colors"> Register</a></p>
      </div>

      <div class="hidden relative md:justify-center md:items-center md:flex md:p-8">
        <img src="svg/undraw_login_re_4vu2.svg" class="h-52 items-center">
      </div>
    </div>

  </body>
