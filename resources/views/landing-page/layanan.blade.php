@extends('landing-page.layouts.app')
@section('content')
<section class="py-15 bg-gray-700 -mt-8">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl pt-8">
        <div class="mx-auto text-center">
            <h2 class="text-4xl uppercase font-normal leading-tight text-white">layanan</h2>
            <div class="mt-4 flex items-center justify-center gap-2">
                <a class="capitalize text-md font-semibold text-white cursor-pointer" href="#">
                    Beranda
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="w-3 h-3 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
                <p class="capitalize text-md font-semibold text-white">
                    layanan
                </p>
            </div>

        </div>
    </div>
</section>

<section class="py-10 bg-gray-50 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="grid max-w-7xl grid-cols-1 gap-6 mx-auto lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 md:gap-9" id="load_layanan">

        </div>
    </div>
</section>

<script>
    const loadlayanan = () => {
        $.ajax({
            type: "GET",
            url: "{{ route('getLayanan') }}",
            success: function(response) {
                let html = '';

                $.each(response.data, function(i, d) {
                    let keteranganHTML = '';

                    $.each(d.keterangan, function(ind, item) {
                        keteranganHTML += `
                            <li class="inline-flex items-center space-x-2">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-base font-medium text-gray-900">${item}</span>
                            </li>
                        `;
                    });

                    html += `
                        <div class="overflow-hidden bg-white border-2 border-transparent rounded-md">
                            <div class="p-6 md:py-8 md:px-9">
                                <h3 class="text-xl font-semibold text-black capitalize">${d.jenis_nama} AC</h3>

                                <div class="flex items-end mt-5">
                                    <div class="flex items-start">
                                        <span class="text-xl font-medium text-black">IDR</span>
                                        <p class="text-6xl font-medium tracking-tight">${d.tarif}</p>
                                    </div>
                                </div>

                                <ul class="flex flex-col mt-8 space-y-4">
                                    ${keteranganHTML}
                                </ul>
                            </div>
                        </div>
                    `;
                });

                $("#load_layanan").html(html);

            },
            error: function(xhr, status, error) {
                console.error('Gagal:', error);
            }
        });
    };

    $(document).ready(function() {
        loadlayanan();
    })
</script>

@endsection