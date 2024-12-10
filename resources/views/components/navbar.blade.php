<nav class="flex bg-blue-400 py-6 pl-8 justify-between pr-8 items-center">
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
</nav>
