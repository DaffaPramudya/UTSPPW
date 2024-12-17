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


        @if (request()->is('/'))
        <form class="max-w-xs mx-auto w-full hidden md:block lg:max-w-lg">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari Sepatu Terbaru..." required />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
        @endif

        <!-- Cart and Profile -->
        <div class="flex items-center justify-between gap-8">
            <!-- Cart -->
            <a href="/carts">
                <i class="fa-solid fa-cart-shopping text-2xl text-blue-400 hover:text-blue-700 transition-colors"></i>
            </a>

            <!-- profile -->
            @auth
                <div class="group flex flex-col relative items-center space-x-4"> {{-- must hover --}}
                    <div class="flex items-center cursor-default">
                        @if (auth()->user()->profilepic)
                            <img src="storage/{{ auth()->user()->profilepic }}"
                                class="h-10 w-10 mr-3 rounded-full object-cover"><span>{{ auth()->user()->username }}</span>
                        @else
                            <img src="storage/profile-images/anonim.png"
                                class="h-10 w-10 mr-3 object-cover"><span>{{ auth()->user()->username }}</span>
                        @endif
                    </div>
                    <div class="absolute top-full left-0 w-full h-8 bg-transparent"></div>
                    <!-- dropdown menu -->
                    <div
                        class="z-40 invisible opacity-0 group-hover:opacity-100 transition-opacity group-hover:visible group-hover:flex group-hover:flex-col w-48 rounded-lg shadow-lg bg-white border-2 p-5 absolute top-full right-0 text-slate-600 mt-4">
                        <div class="mb-2">
                            <a href="/profile"
                                class="hover:text-slate-800 transition-all opacity:0 group-hover:opacity-100">
                                <i class="fa-solid fa-user h-4 w-4 mr-4"></i><span>{{ auth()->user()->username }}</span>
                            </a>
                        </div>
                        @if (auth()->user()->is_admin)
                            <div class="mb-2">
                                <a href="/manage-product"
                                    class="hover:text-slate-800 transition-all opacity:0 group-hover:opacity-100">
                                    <i class="fa-solid fa-box h-4 w-4 mr-4"></i><span>Kelola Produk</span>
                                </a>
                            </div>
                        @endif
                        <div class="">
                            <form action="/logout">
                                <button type="submit"
                                    class="transition-all opacity:0 group-hover:opacity-100 text-red-600 hover:text-red-800">
                                    <i class="fa-solid fa-right-from-bracket h-4 w-4 mr-4"></i><span>Keluar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="group flex flex-col relative items-center"> {{-- must hover --}}
                    <div class="flex items-center cursor-default">
                        <img src="{{ asset('svg/anonim.svg') }}" class="h-10 w-10 mr-3"><span
                            class="font-semibold">Welcome!</span>
                    </div>
                    <div class="absolute top-full left-0 w-full h-8 bg-transparent"></div>
                    <div
                        class="z-40 invisible opacity-0 group-hover:opacity-100 transition-opacity group-hover:visible group-hover:flex group-hover:flex-col w-48 rounded-lg shadow-lg bg-white border-2 p-5 absolute top-full right-0 text-slate-600 mt-4">
                        <div class="mb-2">
                            <a href="/login"
                                class="hover:text-slate-800 transition-all opacity:0 group-hover:opacity-100 duration-500">
                                <i class="fa-solid fa-right-from-bracket h-4 w-4 mr-4"></i><span>Login</span>
                            </a>
                        </div>
                        <div>
                            <a href="/register"
                                class="hover:text-slate-800 transition-all opacity:0 group-hover:opacity-100 duration-500">
                                <i class="fa-solid fa-address-card h-4 w-4 mr-4"></i><span>Register</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</navbar>
