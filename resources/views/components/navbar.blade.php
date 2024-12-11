
<navbar class="bg-white">
    <div class="container mx-auto flex items-center justify-between py-2 px-6 space-x-6 shadow-lg">
        <!-- Logo -->
        <a href="index.php" class="flex-shrink-0">
            <img class="h-14 ml-24 mr-5" src="{{ asset('svg/logo.svg') }}" alt="">
        </a>

        <!-- Search Bar -->
        <div class="flex-grow flex justify-center max-w-xl">
            <form method="GET" action="index.php" id="search-form" class="flex w-full max-w-xl">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Cari produk..." 
                    class="flex-grow h-10 p-4 rounded-l-md border border-gray-300 focus:outline-none"
                    value=""
                />
                <input 
                    type="submit" 
                    value="Cari" 
                    id="save" 
                    class="bg-white text-blue-600 h-10 px-4 py-2 rounded-r-md hover:bg-blue-500 border border-blue-500 hover:text-white cursor-pointer"
                />
            </form>
        </div>

        @if(session()->has('success'))
            <div class="success-message">
                {{session('success')}}
            </div>
        @elseif(session()->has('error'))
            <div class="error-message">
                {{session('error')}}
            </div>
        @endif

        <!-- Cart and Profile -->
        <div class="flex items-center pr-28">
            <!-- Cart -->
            <a href="cart.php" class="px-2">
                <i class="fa-solid fa-cart-shopping text-2xl text-blue-400 hover:text-blue-700 px-8"></i>
            </a>

            <!-- profile -->
            @auth
            <div class="group flex flex-col relative items-center space-x-4"> {{-- must hover --}}
              <div class="flex items-center cursor-default">
                @if (auth()->user()->profilepic)
                  <img src="storage/{{ auth()->user()->profilepic }}" class="h-12 w-12 mr-3"><span>{{ auth()->user()->username }}</span>
                @else
                  <img src="storage/profile-images/anonim.png" class="h-12 w-12 mr-3"><span>{{ auth()->user()->username }}</span>
                @endif
              </div>
              
              <!-- dropdown menu -->
              <div class="invisible opacity-0 group-hover:opacity-100 transition-opacity group-hover:visible group-hover:flex group-hover:flex-col w-48 rounded-lg bg-blue-300 p-4 absolute top-full right-0 text-slate-600">
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
              <div class="invisible opacity-0 group-hover:opacity-100 transition-opacity group-hover:visible group-hover:flex group-hover:flex-col w-48 rounded-lg bg-blue-300 p-4 absolute top-full right-0 text-slate-600">
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

            <!-- Profile -->
            
            <!-- <div class="relative flex items-center space-x-2 cursor-pointer pr-10" id="profile-dropdown-button" >
                @auth
                    @if(auth()->user()->profilepic)
                        <img src="storage/{{auth()->user()->profilepic}}" class="h-8 w-8 rounded-full" alt="">
                    @else
                        <img src="storage/profile-images/anonim.png" class="h-8 w-8 rounded-full" alt="">
                    @endif
                    <span class="text-black text-sm">{{ auth()->user()->username }}</span>
                @else
                    <img src="{{ asset('svg/anonim.svg') }}" class="h-8 w-8 rounded-full" alt="">
                    <span class="text-black text-sm">Welcome!</span>
                @endauth
            </div> -->

            <!-- Dropdown Menu -->
            <!-- <div 
                id="profile-dropdown-menu"
                class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-10"
            >
                @auth
                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fa-solid fa-user mr-2"></i>Profile
                    </a>
                    @if(auth()->user()->is_admin)
                        <a href="/manage-product" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fa-solid fa-box mr-2"></i>Kelola Produk
                        </a>
                    @endif
                    <form action="/logout" method="POST" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fa-solid fa-right-from-bracket mr-2"></i>Keluar
                        </button>
                    </form>
                @else
                    <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fa-solid fa-right-from-bracket mr-2"></i>Login
                    </a>
                    <a href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fa-solid fa-address-card mr-2"></i>Register
                    </a>
                @endauth
            </div>-->
        </div>
    </div>
</navbar>

<!-- <nav class="flex bg-blue-400 py-6 pl-8 justify-between pr-8 items-center">
  <a href="/">
    <h1 class="text-3xl font-semibold hover:scale-110 transition-all duration-300">Dalel Shop</h1>
  </a>
  @auth
    <div class="group flex flex-col relative items-center"> {{-- must hover --}}
      <div class="flex items-center cursor-default">
        @if (auth()->user()->profilepic)
          <img src="storage/{{ auth()->user()->profilepic }}" class="h-12 w-12 mr-3"><span>{{ auth()->user()->username }}</span>
        @else
          <img src="storage/profile-images/anonim.png" class="h-12 w-12 mr-3"><span>{{ auth()->user()->username }}</span>
        @endif
      </div>
      <div class="invisible opacity-0 group-hover:opacity-100 transition-opacity group-hover:visible group-hover:flex group-hover:flex-col w-48 rounded-lg bg-blue-300 p-4 absolute top-full right-0 text-slate-600">
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
        <img src="storage/profile-images/anonim.png" class="h-12 w-12 mr-3"><span class="font-semibold">Login Yuk!</span>
      </div>
      <div class="invisible opacity-0 group-hover:opacity-100 transition-opacity group-hover:visible group-hover:flex group-hover:flex-col w-48 rounded-lg bg-blue-300 p-4 absolute top-full right-0 text-slate-600">
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
</nav> -->
