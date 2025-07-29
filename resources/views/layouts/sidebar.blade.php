<aside class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
    <div class="h-19.5">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
        <a class="flex justify-center items-center px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="javascript:;" target="_blank">
            <img class="" src="{{ asset('assets/img/kooler.png') }}" alt="" width="30%" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand text-xl">Kooler</span>
        </a>
    </div>


    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold hover:bg-white hover:shadow-soft-xl group {{ request()->routeIs('viewapp') ? 'bg-white shadow-soft-xl' : '' }}" href="{{ route('viewapp') }}">
                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 group-hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500 {{ request()->routeIs('viewapp') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="group-hover:text-white {{ request()->routeIs('viewapp') ? 'text-white' : '' }}">
                            <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                            <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                        </svg>


                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
                </a>
            </li>

            <li class="mt-0.5 w-full {{ session('role') == 'teknisi' ? 'hidden' : '' }}">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold hover:bg-white hover:shadow-soft-xl group {{ request()->routeIs('layanan') ? 'bg-white shadow-soft-xl' : '' }}" href="{{ route('layanan') }}">
                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 group-hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500 {{ request()->routeIs('layanan') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="group-hover:text-white {{ request()->routeIs('layanan') ? 'text-white' : '' }}">
                            <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z" clip-rule="evenodd" />
                            <path d="m10.076 8.64-2.201-2.2V4.874a.75.75 0 0 0-.364-.643l-3.75-2.25a.75.75 0 0 0-.916.113l-.75.75a.75.75 0 0 0-.113.916l2.25 3.75a.75.75 0 0 0 .643.364h1.564l2.062 2.062 1.575-1.297Z" />
                            <path fill-rule="evenodd" d="m12.556 17.329 4.183 4.182a3.375 3.375 0 0 0 4.773-4.773l-3.306-3.305a6.803 6.803 0 0 1-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 0 0-.167.063l-3.086 3.748Zm3.414-1.36a.75.75 0 0 1 1.06 0l1.875 1.876a.75.75 0 1 1-1.06 1.06L15.97 17.03a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Layanan</span>
                </a>
            </li>

            <li class="mt-0.5 w-full {{ session('role') == 'teknisi' ? 'hidden' : '' }}">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold hover:bg-white hover:shadow-soft-xl group {{ request()->routeIs('jenis-layanan') ? 'bg-white shadow-soft-xl' : '' }}" href="{{ route('jenis-layanan') }}">
                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 group-hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500 {{ request()->routeIs('jenis-layanan') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="group-hover:text-white {{ request()->routeIs('jenis-layanan') ? 'text-white' : '' }}">
                            <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Jenis Layanan</span>
                </a>
            </li>

            <li class="mt-0.5 w-full {{ session('role') == 'teknisi' ? 'hidden' : '' }}">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold hover:bg-white hover:shadow-soft-xl group {{ request()->routeIs('pemesanan') ? 'bg-white shadow-soft-xl' : '' }}" href="{{ route('pemesanan') }}">
                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 group-hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500 {{ request()->routeIs('pemesanan') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="group-hover:text-white {{ request()->routeIs('pemesanan') ? 'text-white' : '' }}">
                            <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pemesanan</span>
                </a>
            </li>
            <li class="mt-0.5 w-full {{ session('role') == 'karyawan' ? 'hidden' : '' }}">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold hover:bg-white hover:shadow-soft-xl group {{ request()->routeIs('pemesanan-teknisi') ? 'bg-white shadow-soft-xl' : '' }}" href="{{ route('pemesanan-teknisi') }}">
                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 group-hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500 {{ request()->routeIs('pemesanan-teknisi') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="group-hover:text-white {{ request()->routeIs('pemesanan-teknisi') ? 'text-white' : '' }}">
                            <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Pemesanan</span>
                </a>
            </li>

            <li class="mt-0.5 w-full {{ session('role') == 'teknisi' ? 'hidden' : '' }}">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold hover:bg-white hover:shadow-soft-xl group {{ request()->routeIs('users') ? 'bg-white shadow-soft-xl' : '' }}" href="{{ route('users') }}">
                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 group-hover:bg-gradient-to-tl group-hover:from-purple-700 group-hover:to-pink-500 {{ request()->routeIs('users') ? 'bg-gradient-to-tl from-purple-700 to-pink-500' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="group-hover:text-white {{ request()->routeIs('users') ? 'text-white' : '' }}">
                            <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Users</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="mx-4">
        <!-- load phantom colors for card after: -->
        <p class="invisible hidden text-gray-800 text-red-500 text-red-600 after:bg-gradient-to-tl after:from-gray-900 after:to-slate-800 after:from-blue-600 after:to-cyan-400 after:from-red-500 after:to-yellow-400 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-rose-400 after:from-slate-600 after:to-slate-300 text-lime-500 text-cyan-500 text-slate-400 text-fuchsia-500"></p>
        <div class="after:opacity-65 after:bg-gradient-to-tl after:from-slate-600 after:to-slate-300 relative flex min-w-0 flex-col items-center break-words rounded-2xl border-0 border-solid border-blue-900 bg-white bg-clip-border shadow-none after:absolute after:top-0 after:bottom-0 after:left-0 after:z-10 after:block after:h-full after:w-full after:rounded-2xl after:content-['']" sidenav-card>
            <div class="mb-7.5 absolute h-full w-full rounded-2xl bg-cover bg-center" style="background-image: url('./assets/img/curved-images/white-curved.jpeg')"></div>
            <div class="relative z-20 flex-auto w-full p-4 text-left text-white">
                <img class="bg-white rounded p-2 mb-2" src="{{ asset('assets/img/kooler.png') }}" alt="" width="40%" />
                <div class="transition-all duration-200 ease-nav-brand">
                    <h6 class="mb-0 text-white">Kooler</h6>
                    <p class="mt-0 mb-4 text-xs font-semibold leading-tight">Servis & Pemasangan AC Profesional</p>
                    <!-- <a href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/soft-ui-dashboard/" target="_blank" class="inline-block w-full px-8 py-2 mb-0 text-xs font-bold text-center text-black uppercase transition-all ease-in bg-white border-0 border-white rounded-lg shadow-soft-md bg-150 leading-pro hover:shadow-soft-2xl hover:scale-102">Documentation</a> -->
                </div>
            </div>
        </div>
        <!-- pro btn  -->
        <a class="inline-block w-full px-6 py-3 my-4 text-xs font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" href="{{ route('auth.logout') }}">Logout</a>
    </div>
</aside>