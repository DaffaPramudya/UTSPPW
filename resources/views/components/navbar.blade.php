<navbar class="bg-white container">
  <div class="container px-4 py-4 mx-auto flex items-center justify-between sm:py-4 sm:px-12 shadow-lg rounded-md">
    <!-- Logo -->
    <a href="/" class="flex-shrink-0">
      <img class="h-14 hover:scale-110 transition-transform" src="{{ asset('svg/logo.svg') }}" alt="">
    </a>

    @if (session()->has('success'))
      <div class="success-message">
        {{ session('success') }}
      </div>
    @elseif(session()->has('error'))
      <div class="error-message">
        {{ session('error') }}
      </div>
    @endif

    <!-- Cart and Profile -->
    <div class="flex items-center justify-between gap-8">
      <!-- Cart -->
      <a href="cart.php">
        <i class="fa-solid fa-cart-shopping text-2xl text-blue-400 hover:text-blue-700 transition-colors"></i>
      </a>

      <!-- profile -->
      @auth
        <div class="group flex flex-col relative items-center space-x-4"> {{-- must hover --}}
          <div class="flex items-center cursor-default">
            @if (auth()->user()->profilepic)
              <img src="storage/{{ auth()->user()->profilepic }}" class="h-10 w-10 mr-3"><span>{{ auth()->user()->username }}</span>
            @else
              <img src="storage/app/profile-images/default.jpg" class="h-10 w-10 mr-3"><span>{{ auth()->user()->username }}</span>
            @endif
          </div>
          <div class="absolute top-full left-0 w-full h-8 bg-transparent"></div>
          <!-- dropdown menu -->
          <div class="invisible opacity-0 group-hover:opacity-100 transition-opacity group-hover:visible group-hover:flex group-hover:flex-col w-48 rounded-lg shadow-lg bg-white border-2 p-5 absolute top-full right-0 text-slate-600 mt-4">
            <div class="mb-2">
              <a href="/profile" class="hover:text-slate-800 transition-all opacity:0 group-hover:opacity-100">
                <i class="fa-solid fa-user h-4 w-4 mr-4"></i><span>{{ auth()->user()->username }}</span>
              </a>
            </div>
            @if (auth()->user()->is_admin)
              <div class="mb-2">
                <a href="/manage-product" class="hover:text-slate-800 transition-all opacity:0 group-hover:opacity-100">
                  <i class="fa-solid fa-box h-4 w-4 mr-4"></i><span>Kelola Produk</span>
                </a>
              </div>
            @endif
            <div class="">
              <form action="/logout">
                <button type="submit" class="transition-all opacity:0 group-hover:opacity-100 text-red-600 hover:text-red-800">
                  <i class="fa-solid fa-right-from-bracket h-4 w-4 mr-4"></i><span>Keluar</span>
                </button>
              </form>
            </div>
          </div>
        </div>
      @else
        <div class="group flex flex-col relative items-center"> {{-- must hover --}}
          <div class="flex items-center cursor-default">
            <img src="{{ asset('svg/anonim.svg') }}" class="h-10 w-10 mr-3"><span class="font-semibold">Welcome!</span>
          </div>
          <div class="absolute top-full left-0 w-full h-8 bg-transparent"></div>
          <div class="invisible opacity-0 group-hover:opacity-100 transition-opacity group-hover:visible group-hover:flex group-hover:flex-col w-48 rounded-lg shadow-lg bg-white border-2 p-5 absolute top-full right-0 text-slate-600 mt-4">
            <div class="mb-2">
              <a href="/login" class="hover:text-slate-800 transition-all opacity:0 group-hover:opacity-100 duration-500">
                <i class="fa-solid fa-right-from-bracket h-4 w-4 mr-4"></i><span>Login</span>
              </a>
            </div>
            <div>
              <a href="/register" class="hover:text-slate-800 transition-all opacity:0 group-hover:opacity-100 duration-500">
                <i class="fa-solid fa-address-card h-4 w-4 mr-4"></i><span>Register</span>
              </a>
            </div>
          </div>
        </div>
      @endauth
    </div>
  </div>
</navbar>
