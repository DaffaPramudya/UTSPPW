<!DOCTYPE html>
<html lang="en">

@include('components/head')

@if (!Route::is('login', 'register'))
  <body class="min-h-full min-w-full">
    @include('components.navbar')
    @yield('content')
  </body>
@endif

</html>
