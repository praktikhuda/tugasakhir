<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="https://cdn.rareblocks.xyz/collection/celebration/images/logo.svg" />

    <title>Servis & Pemasangan AC Profesional</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- <link href="https://unpkg.com/flowbite@latest/dist/flowbite.min.css" rel="stylesheet" /> -->
    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">


    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
        .required::after {
            content: " *";
            color: rgb(211, 3, 3);
            font-weight: bold;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>

<body>
    <section class="bg-white h-screen">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_2fr] h-full">
            <div class="relative flex items-end px-4 pb-10 pt-60 sm:pb-16 md:justify-center lg:pb-24 bg-gray-50 sm:px-6 lg:px-8">
                <div class="absolute inset-0">
                    <img class="object-cover w-full h-full" src="{{ asset('assets/img/samping.png') }}" alt="" />
                </div>
                <div class="absolute inset-0"></div>

                <div class="relative">

                </div>
            </div>

            <div class="flex items-center justify-center px-4 py-10 bg-white sm:px-6 lg:px-8 sm:py-16 lg:py-24">
                <div class="w-2xl">
                    <div class="flex justify-center items-center mb-5">
                        <div class="flex justify-center items-center mr-5">
                            <button type="button" class="bg-blue-500 text-white rounded-lg shadow-md py-2 px-4" id="tombol_ke1">1</button>
                            <span class="ms-2">Daftar</span>
                        </div>
                        <div class="flex justify-center items-center mx-5">
                            <button type="button" class="bg-gray-100 text-gray-500 rounded-lg shadow-md py-2 px-4" id="tombol_ke2">2</button>
                            <span class="ms-2">Data diri</span>
                        </div>
                        <div class="flex justify-center items-center mx-5">
                            <button type="button" class="bg-gray-100 text-gray-500 rounded-lg shadow-md py-2 px-4" id="tombol_ke3">3</button>
                            <span class="ms-2">Verifikasi</span>
                        </div>
                    </div>

                    <hr class="font-bold mb-5">

                    <div class="space-y-5" id="form_daftar">
                        <p class="mb-1 text-base text-gray-600">Kooler</p>
                        <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl mt-0">Daftar</h2>
                        <div>
                            <label for="" class="text-base font-medium text-gray-900"> Username </label>
                            <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>

                                </div>

                                <input
                                    type="text"
                                    name=""
                                    id="username"
                                    placeholder="Masukan username"
                                    class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                            </div>
                        </div>
                        <div>
                            <label for="" class="text-base font-medium text-gray-900"> Email </label>
                            <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>

                                <input
                                    type="email"
                                    name=""
                                    id="email"
                                    placeholder="Masukan email"
                                    class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                            </div>
                        </div>

                        <div>
                            <label for="" class="text-base font-medium text-gray-900"> Password </label>
                            <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                                    </svg>
                                </div>

                                <input
                                    type="password"
                                    name=""
                                    id="password"
                                    placeholder="Masukan password"
                                    class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                            </div>
                        </div>
                        <div>
                            <label for="" class="text-base font-medium text-gray-900"> Konfirmasi Password </label>
                            <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                                    </svg>
                                </div>

                                <input
                                    type="password"
                                    name=""
                                    id="konfimasi_password"
                                    placeholder="Konfimasi password"
                                    class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                            </div>
                        </div>
                        <div class="flex items-center justify-end">
                            <button
                                type="buttom"
                                class="px-4 py-4 text-base font-semibold text-white transition-all duration-200 border border-transparent rounded-md bg-gradient-to-r from-fuchsia-600 to-blue-600 focus:outline-none hover:opacity-80 focus:opacity-80 cursor-pointer" id="tombol_daftar">
                                <div class="flex justify-center items-center">
                                    <span class="mr-2">Next Step</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z" clip-rule="evenodd" />
                                    </svg>
                                </div>

                            </button>
                        </div>

                        <p class="mt-5 text-sm text-gray-600 text-center">
                            Sudah memiliki akun? <a href="{{ route('auth.masuk') }}" title="" class="text-blue-600 transition-all duration-200 hover:underline hover:text-blue-700">Masuk</a>
                        </p>
                    </div>

                    <div class="space-y-5 hidden" id="form_data_diri">
                        <p class="mb-1 text-base text-gray-600">Kooler</p>
                        <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl mt-0">Data Diri</h2>
                        <div>
                            <label for="" class="text-base font-medium text-gray-900"> Nama Lengkap </label>
                            <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                    </svg>


                                </div>

                                <input
                                    type="text"
                                    name=""
                                    id="nama"
                                    placeholder="Masukan nama lengkap"
                                    class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                            </div>
                        </div>
                        <div>
                            <label for="" class="text-base font-medium text-gray-900"> Alamat </label>
                            <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                    </svg>
                                </div>

                                <input
                                    type="text"
                                    name=""
                                    id="alamat"
                                    placeholder="Masukan alamat"
                                    class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                            </div>
                        </div>

                        <div>
                            <label for="" class="text-base font-medium text-gray-900"> Nomor WA </label>
                            <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                    </svg>
                                </div>

                                <input
                                    type="number"
                                    name=""
                                    id="nomor"
                                    placeholder="Masukan nomor WA"
                                    class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                            </div>
                        </div>
                        <div class="flex items-center justify-end">
                            <button
                                type="buttom"
                                class="px-4 py-4 text-base font-semibold text-white transition-all duration-200 border border-transparent rounded-md bg-gradient-to-r from-fuchsia-600 to-blue-600 focus:outline-none hover:opacity-80 focus:opacity-80 cursor-pointer"
                                id="tombol_data_diri">
                                <div class="flex justify-center items-center">
                                    <span class="mr-2">Next Step</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm4.28 10.28a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 1 0-1.06 1.06l1.72 1.72H8.25a.75.75 0 0 0 0 1.5h5.69l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3Z" clip-rule="evenodd" />
                                    </svg>
                                </div>

                            </button>
                        </div>
                    </div>

                    <div class="space-y-5 hidden" id="form_otp">
                        <p class="mb-1 text-base text-gray-600">Kooler</p>
                        <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl mt-0">Verifikasi</h2>
                        <div>
                            <label for="" class="text-base font-medium text-gray-900"> Kirim OTP </label>
                            <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                                    </svg>

                                </div>

                                <input
                                    type="number"
                                    name=""
                                    id="otp"
                                    placeholder="Masukan OTP"
                                    class="block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600" />
                            </div>
                        </div>
                        <div>
                            <button
                                type="buttom"
                                class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 border border-transparent rounded-md bg-gradient-to-r from-fuchsia-600 to-blue-600 focus:outline-none hover:opacity-80 focus:opacity-80 cursor-pointer"
                                id="tombol_otp">
                                Kirim OTP
                            </button>
                        </div>
                        <p class="mt-5 text-sm text-gray-600 text-center">
                            Tidak mendapatkan kode verifikasi? <button type="button" class="text-blue-600 transition-all duration-200 hover:underline hover:text-blue-700 cursor-pointer" id="kirim_ulang_otp">Kirim Ulang</button>
                        </p>
                    </div>
                </div>
            </div>
    </section>

    <script>
        function kondisi_tombol(data) {
            if (data == 'tombol_daftar') {
                $('#form_daftar').addClass('hidden');
                $('#form_data_diri').removeClass('hidden');

                $("#tombol_ke2").addClass('bg-blue-500 text-white');
                $("#tombol_ke2").removeClass('bg-gray-100 text-gray-500');

                $("#tombol_ke1").removeClass('bg-blue-500 text-white');
                $("#tombol_ke1").addClass('bg-gray-100 text-gray-500');
            } else {
                $('#form_data_diri').addClass('hidden');
                $('#form_otp').removeClass('hidden');

                $("#tombol_ke3").addClass('bg-blue-500 text-white');
                $("#tombol_ke3").removeClass('bg-gray-100 text-gray-500');

                $("#tombol_ke2").removeClass('bg-blue-500 text-white');
                $("#tombol_ke2").addClass('bg-gray-100 text-gray-500');
            }

        }
        $("#tombol_daftar").on("click", function() {
            toastr.info('Mohon tunggu');

            let id_tombol = $(this).attr('id');

            let email = $("#email").val();
            let user = $("#username").val();
            let pass = $("#password").val();
            let konpass = $("#konfimasi_password").val();

            if (pass != konpass) {
                toastr.error('Konfimasi password tidak boleh beda');
                return;
            }

            $.ajax({
                type: "post",
                url: "{{ route('cek_user') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    user: user,
                    email: email
                },
                success: function(response) {
                    if (response.status == 'error') {
                        toastr.error(response.toast);
                    } else {
                        kondisi_tombol(id_tombol);

                        toastr.success(response.toast);
                    }

                }
            });
        })

        $("#tombol_data_diri").on("click", function() {
            let email = $("#email").val();
            let nama = $("#nama").val();
            let alamat = $("#alamat").val();
            let nomor = $("#nomor").val();

            let id_tombol = $(this).attr('id');

            $.ajax({
                type: "post",
                url: "{{ route('auth.register') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email: email,
                    nama: nama,
                    alamat: alamat,
                    nomor: nomor,
                },
                success: function(response) {
                    if (response.status == 'error') {
                        toastr.error(response.toast);
                    } else {
                        kondisi_tombol(id_tombol);
                        toastr.success(response.toast);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error(response.toast);
                }
            });

        })

        $("#tombol_otp").on("click", function() {
            toastr.info('Mohon tunggu');

            let email = $("#email").val();
            let pass = $("#password").val();
            let user = $("#username").val();
            let nama = $("#nama").val();
            let alamat = $("#alamat").val();
            let nomor = $("#nomor").val();

            let otp = $("#otp").val();

            $.ajax({
                type: "post",
                url: "{{ route('auth.send_otp') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email: email,
                    user: user,
                    alamat: alamat,
                    nomor: nomor,
                    nama: nama,
                    password: pass,
                    otp: otp
                },
                success: function(response) {
                    if (response.status == 'error') {
                        toastr.error(response.toast);
                    } else {
                        toastr.success(response.toast);
                        window.location.href = "/auth/masuk";
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error(response.toast);
                }
            });
        })

        $("#kirim_ulang_otp").on("click", function() {
            toastr.info('Mohon tunggu');
            let email = $("#email").val();

            $.ajax({
                type: "post",
                url: "{{ route('auth.register') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    email: email
                },
                success: function(response) {
                    toastr.success(response.toast);
                },
                error: function(xhr, status, error) {
                    toastr.error(response.toast);
                }
            });
        })
    </script>
</body>

</html>