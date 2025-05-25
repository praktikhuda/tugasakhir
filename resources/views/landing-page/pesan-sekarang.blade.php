@extends('landing-page.layouts.app')
@section('content')
<section class="py-15 bg-gray-700 -mt-8">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl pt-8">
        <div class="mx-auto text-center">
            <h2 class="text-4xl uppercase font-normal leading-tight text-white">Pesan Sekarang</h2>
            <div class="mt-4 flex items-center justify-center gap-2">
                <a class="capitalize text-md font-semibold text-white cursor-pointer" href="#">
                    Beranda
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="w-3 h-3 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
                <p class="capitalize text-md font-semibold text-white">
                    Pesan Sekarang
                </p>
            </div>

        </div>
    </div>
</section>

<section class="py-10 bg-gray-100 sm:py-16 lg:py-4">
    <div class="px-4 mx-auto sm:px-6 lg:px-4 max-w-7xl">
        <div class="mt-12 sm:mt-16 mb-12 sm:mb-16">
            <div class="mt-6 overflow-hidden bg-white rounded-xl">
                <div class="px-6 py-12 sm:p-12">
                    <form class="">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-5 gap-y-4">
                            <div>
                                <label for="" class="text-base font-medium text-gray-900 required">Nama Lengkap</label>
                                <div class="mt-2.5 relative">
                                    <input type="text" name="namalengkap" id="namalengkap" placeholder="" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600" required />
                                    <p class="text-red-600" id="alertnama"></p>
                                </div>
                            </div>

                            <div>
                                <label for="" class="text-base font-medium text-gray-900 required">Email</label>
                                <div class="mt-2.5 relative">
                                    <input type="email" name="email" id="email" placeholder="" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600" required />
                                    <p class="text-red-600" id="alertemail"></p>
                                </div>
                            </div>

                            <div>
                                <label for="" class="text-base font-medium text-gray-900 required">Nomer WhatsApp</label>
                                <div class="mt-2.5 relative">
                                    <input type="number" name="nomer" id="nomer" placeholder="" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600" required />
                                    <p class="text-red-600" id="alertnomer"></p>
                                </div>
                            </div>

                            <div>
                                <label for="" class="text-base font-medium text-gray-900 required">Alamat</label>
                                <div class="mt-2.5 relative">
                                    <input type="text" name="alamat" id="alamat" placeholder="" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600" required />
                                    <p class="text-red-600" id="alertalamat"></p>
                                </div>
                            </div>

                            <div>
                                <label for="" class="text-base font-medium text-gray-900 required">Tanggal</label>
                                <div class="mt-2.5 relative">
                                    <input type="date" name="tanggal" id="tanggal" placeholder="" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600" required />
                                    <p class="text-red-600" id="alerttanggal"></p>
                                </div>
                            </div>

                            <div>
                                <label for="" class="text-base font-medium text-gray-900 required">Pilih Layanan</label>
                                <div class="mt-2.5 relative">
                                    <select name="layanan" id="layanan" required class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600" required>
                                        <option value="">-- Pilih Jenis Layanan --</option>
                                        <option value="pemasangan">Pemasangan AC</option>
                                        <option value="cuci">Servis / Cuci AC</option>
                                        <option value="perbaikan">Perbaikan AC</option>
                                        <option value="isi_freon">Isi Ulang Freon</option>
                                        <option value="bongkar_pasang">Bongkar Pasang AC</option>
                                    </select>
                                    <p class="text-red-600" id="alertlayanan"></p>
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="" class="text-base font-medium text-gray-900"> Catatan </label>
                                <div class="mt-2.5 relative">
                                    <textarea name="catatan" id="catatan" placeholder="" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md resize-y focus:outline-none focus:border-blue-600" rows="4"></textarea>
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <button type="button" class="inline-flex items-center justify-center w-full px-4 py-4 mt-2 text-base font-semibold text-white transition-all duration-200 bg-blue-600 border border-transparent rounded-md focus:outline-none hover:bg-blue-700 focus:bg-blue-700 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed" id="tambahpesanan">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="toats" class="fixed bottom-5 right-5 flex flex-col-reverse space-y-2 space-y-reverse z-50"></div>

<script>
    $("#tambahpesanan").on("click", function() {
        const btn = $(this);
        btn.prop("disabled", true);

        const nama = $("#namalengkap").val().trim();
        const email = $('#email').val().trim();
        const nomer = $('#nomer').val().trim();
        const alamat = $('#alamat').val().trim();
        const tanggal = $('#tanggal').val().trim();
        const layanan = $('#layanan').val().trim();
        const catatan = $('#catatan').val().trim();

        let isValid = true;

        if (nama === "") {
            $("#alertnama").text("Nama tidak boleh kosong!");
            isValid = false;
        } else {
            $("#alertnama").text("");
        }

        if (email === "") {
            $("#alertemail").text("Email tidak boleh kosong!");
            isValid = false;
        } else {
            $("#alertemail").text("");
        }

        if (nomer === "") {
            $("#alertnomer").text("Nomor tidak boleh kosong!");
            isValid = false;
        } else {
            $("#alertnomer").text("");
        }

        if (alamat === "") {
            $("#alertalamat").text("Tanggal tidak boleh kosong!");
            isValid = false;
        } else {
            $("#alertalamat").text("");
        }

        if (tanggal === "") {
            $("#alerttanggal").text("Tanggal tidak boleh kosong!");
            isValid = false;
        } else {
            $("#alerttanggal").text("");
        }

        if (layanan === "") {
            $("#alertlayanan").text("Tanggal tidak boleh kosong!");
            isValid = false;
        } else {
            $("#alertlayanan").text("");
        }

        if (!isValid) {
            btn.prop("disabled", false);
            return;
        }

        const id = 'toast-' + Date.now();

        $("#toats").prepend(toats('Sedang di proses!!', 'menunggu', 'yellow'));

        $.ajax({
            type: "POST",
            url: "/tambah",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // penting untuk Laravel
                namalengkap: nama,
                email: email,
                nomer: nomer,
                alamat: alamat,
                tanggal: tanggal,
                layanan: layanan,
                catatan: catatan
            },
            dataType: "json",
            success: function(response) {
                console.log("Berhasil:", response);

                $("#toats").prepend(toats(response.message, 'berhasil', 'green'));

                setTimeout(function() {
                    $("#toats").html('');
                    window.location.href = "/tentang-kami";
                }, 3000);

            },
            error: function(xhr, status, error) {
                btn.prop("disabled", false);

                let errorMessage = "Terjadi kesalahan. Silakan coba lagi.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }


                $("#toats").prepend(toats(errorMessage, 'error', 'red'));

                setTimeout(function() {
                    $("#toats").html('');
                }, 3000);
            }
        });
    })
</script>

@endsection