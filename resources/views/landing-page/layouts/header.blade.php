<header class="bg-blue-700 lg:pb-0 sticky top-0 z-20 lg:rounded-none md:rounded-b-4xl sm:rounded-b-3xl rounded-b-3xl" id="header-menu">
    <div class="bg-white lg:rounded-b-3xl md:rounded-b-3xl sm:rounded-b-2xl rounded-b-xl border border-gray-300">

        <div class="px-4 flex items-center justify-between max-w-7xl sm:px-6 lg:px-8 lg:py-3 md:py-3 py-3 mx-auto">
            <a href="#" title="" class="flex items-center">
                <img class="w-auto h-10 lg:h-15 md:h-10 sm:h-10" src="{{ ('assets/img/kooler.png') }}" alt="" />
            </a>
            <button type="button" class="inline-flex  text-black transition-all duration-200 rounded-md lg:hidden focus:bg-gray-100 hover:bg-gray-100" id="tombol-menu" data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                </svg>

            </button>
        </div>

    </div>
    <div class="mx-auto max-w-7xl sm:px-6 md:px-8 hidden sm:hidden md:hidden lg:block">
        <!-- lg+ -->
        <div class="mx-auto max-w-7xl">
            <!-- lg+ -->
            <nav class="flex items-center lg:justify-between md:justify-end sm:justify-end justify-end transition-all duration-150 ease-in-out py-3" id="nav-padding">
                <div class="flex-shrink-0">
                    <div class="hidden lg:flex lg:items-center lg:ml-auto lg:space-x-10">
                        <a href="{{ route('beranda') }}" title="" class="text-xs uppercase text-white transition-all duration-200 hover:underline hover:underline-offset-8 {{ request()->routeIs('beranda') ? 'underline underline-offset-8' : '' }}">Beranda</a>
                        <a href="{{ route('cek-layanan') }}" title="" class="text-xs uppercase text-white transition-all duration-200 hover:underline hover:underline-offset-8 {{ request()->routeIs('cek-layanan') ? 'underline underline-offset-8' : '' }}"> Layanan </a>
                        <a href="{{ route('kalender') }}" title="" class="text-xs uppercase text-white transition-all duration-200 hover:underline hover:underline-offset-8 {{ request()->routeIs('kalender') ? 'underline underline-offset-8' : '' }}"> Cek Jadwal</a>
                    </div>
                </div>

                <div>
                    @if(session('role'))
                    <a href="{{ route('dashboard') }}" title="" class="items-center justify-center hidden px-10 py-2 text-xs uppercase text-gray-900 transition-all duration-200 rounded-md lg:inline-flex bg-yellow-500 hover:bg-yellow-400 font-semibold" role="button"> Dashboard </a>
                    <a href="{{ route('auth.logout') }}" title="" class="items-center justify-center hidden px-10 py-2 text-xs uppercase text-gray-900 transition-all duration-200 rounded-md lg:inline-flex bg-red-500 hover:bg-red-400 font-semibold" role="button"> Logout </a>
                    @else
                    <a href="{{ route('auth.masuk') }}" title="" class="items-center justify-center hidden px-10 py-2 text-xs uppercase text-gray-900 transition-all duration-200 rounded-md lg:inline-flex bg-yellow-500 hover:bg-yellow-400 font-semibold" role="button"> Masuk </a>
                    <a href="{{ route('auth.daftar') }}" title="" class="items-center justify-center hidden px-10 py-2 text-xs uppercase text-gray-900 transition-all duration-200 rounded-md lg:inline-flex bg-yellow-500 hover:bg-yellow-400 font-semibold ml-2" role="button"> Daftar </a>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</header>

<aside id="cta-button-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:block md:block lg-hidden " aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-white lg-hidden flex flex-col">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="#" title="" class="flex pb-3">
                    <img class="w-auto h-10 lg:h-15 md:h-10 sm:h-10" src="{{ ('assets/img/kooler.png') }}" alt="" />
                </a>
                <hr>
            </li>
            <li>
                <a href="{{ route('beranda') }}" title="" class="flex items-center p-2 text-black rounded-lg uppercase text-sm hover:bg-blue-600 hover:text-white {{ request()->routeIs('beranda') ? 'bg-blue-500 text-white' : '' }}">Beranda</a>
            </li>
            <li>
                <a href="{{ route('cek-layanan') }}" title="" class="flex items-center p-2 text-black rounded-lg uppercase text-sm hover:bg-blue-600 hover:text-white {{ request()->routeIs('cek-layanan') ? 'bg-blue-500 text-white' : '' }}"> cek-layanan </a>
            </li>
        </ul>
        <div class="mt-auto pt-4 grid justify-items-stretch">
            <a href="{{ route('auth.masuk') }}" title="" class="px-10 py-2 text-xs uppercase text-white transition-all duration-200 rounded-full lg:inline-flex bg-gradient-to-l from-yellow-400 to-yellow-700 mt-2 text-center" role="button"> Masuk </a>
            <a href="{{ route('auth.daftar') }}" title="" class="px-10 py-2 text-xs uppercase text-white transition-all duration-200 rounded-full lg:inline-flex bg-gradient-to-l from-yellow-400 to-yellow-700 mt-2 text-center" role="button"> Daftar </a>
        </div>
    </div>
</aside>