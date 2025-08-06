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
                <div class="">
                    <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl text-center">Selamat Datang di Kooler</h2>
                    <p class="mt-2 text-base text-gray-600 text-center mb-4">Layanan Panggilan ke Rumah/Kantor - Harga Jujur, Teknisi Berpengalaman</p>

                    <div class="space-y-5">
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
                        <!-- <p class="mt-5 text-sm text-gray-600 flex justify-end">
                            <a href="#" title="" class="text-blue-600 transition-all duration-200 hover:underline hover:text-blue-700">Lupa kata sandi?</a>
                        </p> -->

                        <div>
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 border border-transparent rounded-md bg-gradient-to-r from-fuchsia-600 to-blue-600 focus:outline-none hover:opacity-80 focus:opacity-80 cursor-pointer"
                                id="tombol_masuk">
                                Masuk
                            </button>
                        </div>
                    </div>

                    <p class="mt-5 text-sm text-gray-600 text-center">
                        Belum memiliki akun? <a href="{{ route('auth.daftar') }}" title="" class="text-blue-600 transition-all duration-200 hover:underline hover:text-blue-700">Daftar</a>
                    </p>
                    <p class="mt-5 text-sm text-gray-600 text-center">
                        Kembali ke <a href="{{ route('beranda') }}" title="" class="text-blue-600 transition-all duration-200 hover:underline hover:text-blue-700">Beranda</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script>
        $("#tombol_masuk").on("click", function() {
            toastr.info('Mohon tunggu');

            let user = $("#username").val();
            let pass = $("#password").val();

            $.ajax({
                type: "post",
                url: "{{ route('auth.authenticate') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    username: user,
                    password: pass
                },
                success: function(response) {
                    if (response.status == 'error') {
                        toastr.error(response.toast);
                    } else {
                        window.location.href = "/auth/masuk";
                        toastr.success(response.toast);
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error(response.toast);
                }
            });
        })
    </script>
</body>

</html>