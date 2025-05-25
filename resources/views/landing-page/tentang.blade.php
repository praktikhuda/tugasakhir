@extends('landing-page.layouts.app')
@section('content')
<section class="py-15 bg-gray-700 -mt-8">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl pt-8">
        <div class="mx-auto text-center">
            <h2 class="text-3xl uppercase font-normal leading-tight text-white">Tentang Kami</h2>
            <p class="mt-2 flex items-center justify-center gap-1 capitalize text-md font-normal text-white">
                Beranda
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
                Tentang Kami
            </p>

        </div>
    </div>
</section>

<section class="py-10 bg-gray-50 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid items-stretch gap-y-10 md:grid-cols-2 md:gap-x-20">
            <div class="relative grid grid-cols-2 gap-6 mt-10 md:mt-0">
                <div class="overflow-hidden aspect-w-3 aspect-h-4">
                    <img class="object-cover object-top origin-top scale-150" src="https://cdn.rareblocks.xyz/collection/celebration/images/features/2/team-work.jpg" alt="" />
                </div>

                <div class="relative">
                    <div class="h-full overflow-hidden aspect-w-3 aspect-h-4">
                        <img class="object-cover scale-150 lg:origin-bottom-right" src="https://cdn.rareblocks.xyz/collection/celebration/images/features/2/woman-working-on-laptop.jpg" alt="" />
                    </div>

                    <div class="absolute inset-0 grid w-full h-full place-items-center">
                        <button type="button" class="inline-flex items-center justify-center w-12 h-12 text-blue-600 bg-white rounded-full shadow-md lg:w-20 lg:h-20">
                            <svg class="w-6 h-6 lg:w-8 lg:h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 6.82v10.36c0 .79.87 1.27 1.54.84l8.14-5.18c.62-.39.62-1.29 0-1.69L9.54 5.98C8.87 5.55 8 6.03 8 6.82z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="absolute -translate-x-1/2 left-1/2 -top-16">
                    <img class="w-32 h-32" src="https://cdn.rareblocks.xyz/collection/celebration/images/features/2/round-text.png" alt="" />
                </div>
            </div>

            <div class="flex flex-col items-start xl:px-16">
                <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">Profesional dalam Pemasangan & Perawatan AC</h2>
                <p class="mt-4 text-base leading-relaxed text-gray-600">[Nama Bisnis Anda] adalah penyedia jasa spesialis pemasangan, perawatan, dan perbaikan AC yang berkomitmen memberikan pelayanan terbaik untuk rumah, kantor, hingga tempat usaha Anda. Kami berdiri dengan misi utama: menjaga kenyamanan udara di setiap ruangan pelanggan kami dengan pelayanan yang cepat, jujur, dan berkualitas.</p>


            </div>
        </div>
    </div>
</section>

<section class="py-10 bg-gray-50 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid items-stretch gap-y-10 md:grid-cols-2 md:gap-x-20">
            <div class="flex flex-col items-start xl:px-16">
                <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">Berpengalaman & Terpercaya</h2>
                <p class="mt-4 text-base leading-relaxed text-gray-600">Dengan tim teknisi berpengalaman lebih dari [x] tahun di bidang pendingin udara, kami siap menangani berbagai kebutuhan AC Anda, mulai dari pemasangan unit baru, cuci AC rutin, isi ulang freon, hingga perbaikan kerusakan berat. Semua pekerjaan dilakukan dengan standar profesional dan menggunakan alat kerja lengkap serta freon berkualitas.</p>


            </div>
            <div class="relative grid grid-cols-2 gap-6 mt-10 md:mt-0">
                <div class="overflow-hidden aspect-w-3 aspect-h-4">
                    <img class="object-cover object-top origin-top scale-150" src="https://cdn.rareblocks.xyz/collection/celebration/images/features/2/team-work.jpg" alt="" />
                </div>

                <div class="relative">
                    <div class="h-full overflow-hidden aspect-w-3 aspect-h-4">
                        <img class="object-cover scale-150 lg:origin-bottom-right" src="https://cdn.rareblocks.xyz/collection/celebration/images/features/2/woman-working-on-laptop.jpg" alt="" />
                    </div>

                    <div class="absolute inset-0 grid w-full h-full place-items-center">
                        <button type="button" class="inline-flex items-center justify-center w-12 h-12 text-blue-600 bg-white rounded-full shadow-md lg:w-20 lg:h-20">
                            <svg class="w-6 h-6 lg:w-8 lg:h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 6.82v10.36c0 .79.87 1.27 1.54.84l8.14-5.18c.62-.39.62-1.29 0-1.69L9.54 5.98C8.87 5.55 8 6.03 8 6.82z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="absolute -translate-x-1/2 left-1/2 -top-16">
                    <img class="w-32 h-32" src="https://cdn.rareblocks.xyz/collection/celebration/images/features/2/round-text.png" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-10 bg-gray-50 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">Meet the brains</h2>
            <p class="max-w-md mx-auto mt-4 text-base leading-relaxed text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.</p>
        </div>

        <div class="grid grid-cols-2 mt-8 text-center sm:mt-16 lg:mt-20 sm:grid-cols-4 gap-y-8 lg:grid-cols-9 gap-x-0">
            <div>
                <img class="object-cover mx-auto rounded-lg w-28 h-28" src="https://cdn.rareblocks.xyz/collection/celebration/images/team/3/team-avatar-1.jpg" alt="" />
                <p class="mt-8 text-lg font-semibold leading-tight text-black">Jenny Wilson</p>
                <p class="mt-1 text-base leading-tight text-gray-600">Founder</p>
            </div>

            <div class="hidden lg:block"></div>
        </div>
    </div>
</section>
@endsection