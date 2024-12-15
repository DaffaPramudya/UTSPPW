@extends('components.layout')
@section('title', 'Register')
@section('content')

  <body class="bg-auth-bg bg-cover min-h-screen min-w-screen flex items-center">
    <div class="my-8 mx-auto md:grid md:grid-cols-2 border rounded-lg container px-6 py-10 sm:p-10 bg-white sm:block xl:max-w-screen-lg shadow-lg">
      <div class="hidden relative md:justify-center md:items-center md:flex">
        <img src="svg/undraw_join_re_w1lh.svg" class="h-64 items-center">
      </div>

      <div class="p-8 sm:py-14 sm:px-20 border shadow-lg rounded-lg md:p-8">
        <form action="/register" method="post" class="flex flex-col mb-6">
          @csrf
          <p class="text-2xl font-semibold mb-8 text-center cursor-default">Register</p>
          <!-- Error message display -->
          @if ($errors->any())
            <div class="error-message">
              @foreach ($errors->all() as $error)
                {{ $error }}
              @endforeach
            </div>
          @endif

          <!-- username -->
          <div class="border-solid border py-3 px-3 mb-2 rounded-lg flex items-center overflow-hidden">
            <i class="fa-solid fa-user w-4 h-4 mr-3"></i>
            <input class="text-sm outline-none" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
          </div>

          <!-- email -->
          <div class="border-solid border py-3 px-3 mb-2 rounded-lg flex items-center overflow-hidden">
            <i class="fa-solid fa-envelope w-4 h-4 mr-3"></i>
            <input class="text-sm outline-none" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
          </div>

          <!-- password -->
          <div class="border-solid border py-3 px-3 mb-5 rounded-lg flex items-center overflow-hidden">
            <i class="fa-solid fa-lock w-4 h-4 mr-3"></i>
            <input class="text-sm outline-none" type="password" name="password" placeholder="Password">
          </div>

          <input type="submit" value="Register" class="border rounded-lg w-40 py-2 self-center bg-blue-600 hover:bg-blue-700 transition-colors text-white font-semibold cursor-pointer">

        </form>

        <p class="flex items-center justify-center text-sm">Sudah punya akun? <a href="/login" class="ml-0.5 underline font-semibold hover:text-gray-800 transition-colors">Login</a></p>
      </div>
    </div>
  </body>
