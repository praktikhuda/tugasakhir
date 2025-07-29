@extends('landing-page.layouts.app')
@section('content')
<section class="py-15 bg-gray-700 -mt-8">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl pt-8">
        <div class="mx-auto text-center">
            <h2 class="text-4xl uppercase font-normal leading-tight text-white">Batalkan Pesanana</h2>
            <div class="mt-4 flex items-center justify-center gap-2">
                <a class="capitalize text-md font-semibold text-white cursor-pointer" href="#">
                    Beranda
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="w-3 h-3 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
                <p class="capitalize text-md font-semibold text-white">
                    Batalkan Pesanan
                </p>
            </div>

        </div>
    </div>
</section>

<section class="py-10 bg-gray-100 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <form class="">
            <div class="sm:p-2 sm:bg-white sm:border-2 sm:border-transparent sm:rounded-full sm:focus-within:border-blue-600 sm:focus-within:ring-1 sm:focus-within:ring-blue-600">
                <div class="flex flex-col items-start sm:flex-row sm:justify-center">
                    <div class="flex-1 w-full min-w-0">
                        <div class="relative text-gray-400 focus-within:text-gray-600">
                            <input
                                type="text"
                                name="kode"
                                id="kode"
                                placeholder="Masukan Kode Pembatalan"
                                class="block w-full py-4 pl-10 pr-4 text-base text-black placeholder-gray-500 transition-all duration-200 border-transparent rounded-full focus:border-transparent focus:ring-0 caret-blue-600"
                                required="" />
                        </div>
                    </div>

                    <button type="button" class="inline-flex items-center justify-center w-auto px-4 py-4 mt-4 font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-full sm:ml-4 sm:mt-0 sm:w-auto hover:bg-blue-700 focus:bg-blue-700 cursor-pointer" id="batalkan">
                        Batalkan Pesanan
                        <svg class="w-5 h-5 ml-3 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
            <p class="text-red-600 px-5 ms-5" id="alertkode"></p>
        </form>
    </div>
</section>

<div id="toats" class="fixed bottom-5 right-5 flex flex-col-reverse space-y-2 space-y-reverse z-70"></div>

<div id="load-modal"></div>



<script>
    $(document).ready(function() {

        $('#batalkan').off('click').on('click', function() {
            const btn = $(this);

            toastr.info('Mohon tunggu..');
            btn.prop("disabled", true);

            const kode = $("#kode").val().trim();


            let isValid = true;

            if (kode === "") {
                toastr.error('kode tidak boleh kosong');
                isValid = false;
                return;
            }

            if (!isValid) {
                btn.prop("disabled", false);
                return;
            }

            $.ajax({
                type: "POST",
                url: "/cekKode",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    kode: kode
                },
                dataType: "json",
                success: function(response) {
                    $("#load-modal").load('/modal-detail', function() {
                        $("#crud-modal").removeClass("hidden").addClass("flex");
                    })
                    btn.prop("disabled", false);
                },
                error: function(xhr, status, error) {
                    btn.prop("disabled", false);

                    let errorMessage = "Terjadi kesalahan. Silakan coba lagi.";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    toastr.info(errorMessage);
                }
            });
        });

        $("#load-modal").off("click", "#tutupModal").on("click", "#tutupModal", function() {
            $("#crud-modal").removeClass("flex").addClass("hidden");
        });


    });


    $("#load-modal").off("click", "#tambahpesanan").on("click", "#tambahpesanan", function() {
        const btn = $(this);
        toastr.info('Mohon tunggu..');

        btn.prop("disabled", true);

        const alasan = $("#description").val().trim();
        const kode = $("#kode").val().trim();

        let isValid = true;

        if (alasan === "") {
            toastr.error('harus di isi semua');
            isValid = false;
            return;
        }

        if (!isValid) {
            btn.prop("disabled", false);
            return;
        }

        $.ajax({
            type: "POST",
            url: "/updateBatalkan",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                kode: kode,
                alasan: alasan
            },
            dataType: "json",
            success: function(response) {
                toastr.success(response.message);
                window.location.href = "{{ route('beranda') }}";
            },
            error: function(xhr, status, error) {
                btn.prop("disabled", false);

                let errorMessage = "Terjadi kesalahan. Silakan coba lagi.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                toastr.success(errorMessage);
            }
        });
    })
</script>

@endsection