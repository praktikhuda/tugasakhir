@extends('landing-page.layouts.app')
@section('content')
<section class="py-15 bg-gray-700 -mt-8">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl pt-8">
        <div class="mx-auto text-center">
            <h2 class="text-4xl uppercase font-normal leading-tight text-white">proil pelanggan</h2>
            <div class="mt-4 flex items-center justify-center gap-2">
                <a class="capitalize text-md font-semibold text-white cursor-pointer" href="#">
                    Beranda
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="w-3 h-3 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
                <p class="capitalize text-md font-semibold text-white">
                    profil pelanggan
                </p>
            </div>

        </div>
    </div>
</section>

<section class="py-10 bg-white sm:py-16 lg:py-24">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-1 gap-y-8 lg:grid-cols-[1fr_2fr] sm:gap-12">
            <div class="">
                <img src="{{ asset('assets/img/profil.png') }}" alt="" class="rounded-md drop-shadow-md mb-5">

                <div class="flex justify-between">
                    <button type="button" class="bg-yellow-500 rounded-md hover:bg-yellow-400 hover:text-gray-400 px-4 py-2 cursor-pointer capitalize" id="ubah_profil">ubah profil</button>
                    <button type="button" class="bg-yellow-500 rounded-md hover:bg-yellow-400 hover:text-gray-400 px-4 py-2 cursor-pointer capitalize" id="ubah_password">ubah password</button>
                </div>
            </div>

            <div>
                <table class="table-auto" id="table_detail_profil">
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="p-3 bg-blue-500 mt-5 rounded-md text-white capitalize">dalam proses</div>
        <div class="mt-3">
            <div class="mb-2 flex justify-between">
                <div class="flex justify-stretch">
                    <select name="" id="entri_data_proses" class="border rounded-sm">
                        <option value="10" class="text-center">10</option>
                        <option value="25" class="text-center">25</option>
                        <option value="50" class="text-center">50</option>
                        <option value="100" class="text-center">100</option>
                    </select>
                    <span>&nbsp;entri per halaman</span>
                </div>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2 mt-4 mb-2">
                <div class="p-0 overflow-x-auto p-3">
                    <table class="items-center w-full mb-0 align-top" id="tabel-pemesanan-proses">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-gray-400 shadow-none text-md border-b-solid tracking-none text-gray-700">No</th>
                                <th class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-gray-400 shadow-none text-md border-b-solid tracking-none text-gray-700">Lokasi</th>
                                <th class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-gray-400 shadow-none text-md border-b-solid tracking-none text-gray-700">Tanggal</th>
                                <th class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-gray-400 shadow-none text-md border-b-solid tracking-none text-gray-700">Kontak</th>
                                <th class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-gray-400 shadow-none text-md border-b-solid tracking-none text-gray-700">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-2 mb-4 flex justify-between content-center">
                <span id="showing_entri_proses"></span>
                <div class="flex justify-end" id="load_pagination_proses"></div>
            </div>
        </div>

        <div class="p-3 bg-blue-500 mt-5 rounded-md text-white capitalize">riwayat pemesanan</div>
        <div class="mt-3">
            <div class="mb-2 flex justify-between">
                <div class="flex justify-stretch">
                    <select name="" id="entri_data" class="border rounded-sm">
                        <option value="10" class="text-center">10</option>
                        <option value="25" class="text-center">25</option>
                        <option value="50" class="text-center">50</option>
                        <option value="100" class="text-center">100</option>
                    </select>
                    <span>&nbsp;entri per halaman</span>
                </div>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2 mt-4 mb-2">
                <div class="p-0 overflow-x-auto p-3">
                    <table class="items-center w-full mb-0 align-top" id="tabel-pemesanan">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-gray-400 shadow-none text-md border-b-solid tracking-none text-gray-700">No</th>
                                <th class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-gray-400 shadow-none text-md border-b-solid tracking-none text-gray-700">Lokasi</th>
                                <th class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-gray-400 shadow-none text-md border-b-solid tracking-none text-gray-700">Tanggal</th>
                                <th class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-gray-400 shadow-none text-md border-b-solid tracking-none text-gray-700">Kontak</th>
                                <th class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-gray-400 shadow-none text-md border-b-solid tracking-none text-gray-700">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-2 mb-4 flex justify-between content-center">
                <span id="showing_entri"></span>
                <div class="flex justify-end" id="load_pagination"></div>
            </div>
        </div>
    </div>
</section>

<div id="open_modal"></div>

<script>
    $(document).ready(function() {
        initPemesananTabel();
        initPemesananTabelProses();
        load_detail();
        // $.ajax({
        //     type: "get",
        //     url: "{{ route('show_riwayat') }}",
        //     success: function(response) {

        //     }
        // });
    });

    function load_detail() {
        $.ajax({
            type: "get",
            url: "{{ route('profil') }}",
            success: function(response) {
                let html = `
                    <tr>
                        <td class="capitalize font-semibold py-3" width="60%">nama lengkap</td>
                        <td width="5%">:</td>
                        <td>${response.data.nama}</td>
                    </tr>
                    <tr>
                        <td class="capitalize font-semibold py-3">alamat</td>
                        <td width="5%">:</td>
                        <td>${response.data.alamat}</td>
                    </tr>
                    <tr>
                        <td class="capitalize font-semibold py-3">email</td>
                        <td width="5%">:</td>
                        <td>${response.data.email}</td>
                    </tr>
                    <tr>
                        <td class="capitalize font-semibold py-3">nomor</td>
                        <td width="5%">:</td>
                        <td>${response.data.nomor}</td>
                    </tr>
                    `;

                $("#table_detail_profil tbody").html(html)
            }
        });
    }

    $("#ubah_profil").on("click", function() {
        $('#open_modal').load('/modal/detail-v2', function() {
            $.ajax({
                type: "get",
                url: "{{ route('profil') }}",
                success: function(response) {
                    $("#id").val(response.data.id);
                    $("#nama").val(response.data.nama);
                    $("#alamat").val(response.data.alamat);
                    $("#nomor").val(response.data.nomor);
                    $("#email").val(response.data.email);
                }
            });
        });
    })
    $("#ubah_password").on("click", function() {
        $('#open_modal').load('/modal/detail-v3', function() {});
    })

    function initPemesananTabel() {
        let timer;

        $(document).ready(function() {
            loadAjaxTabel(1, 10);
        });

        function loadAjaxTabel(hal, perPage) {
            $.ajax({
                type: "get",
                url: "{{ route('show_riwayat') }}",
                data: {
                    hal,
                    perPage
                },
                success: function(response) {
                    $("#tabel-pemesanan tbody").html(`<tr>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center" colspan="7">Menunggu...</td>
                </tr>`);
                    loadTabel(response, hal, perPage);
                }
            });
        }

        function loadTabel(data, hal, perPage) {
            let html = '';
            let pagination = '';
            let showing = '';

            if (data.total_data == 0) {
                html = `<tr>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center" colspan="7">Data tidak ditemukan</td>
            </tr>`;
            } else {
                $.each(data.data, function(i, d) {
                    html += `
                    <tr>
                        <td class="p-2 align-middle bg-transparent border-b border-gray-400 whitespace-nowrap shadow-transparent text-center">${nomer_urut(hal || 1, i, perPage)}</td>
                        <td class="p-2 align-middle bg-transparent border-b border-gray-400 whitespace-nowrap shadow-transparent">${d.lokasi}</td>
                        <td class="p-2 align-middle bg-transparent border-b border-gray-400 whitespace-nowrap shadow-transparent">${d.kontak}</td>
                        <td class="p-2 align-middle bg-transparent border-b border-gray-400 whitespace-nowrap shadow-transparent">${d.tanggal}</td>
                        <td class="p-2 align-middle bg-transparent border-b border-gray-400 whitespace-nowrap shadow-transparent">${d.status}</td>
                    </tr>`;
                });

                let totalHalaman = Math.ceil(data.total_data / perPage);
                let pageActive = hal || 1;

                const createBtn = (i) => `
                <button 
                    class="text-center border p-2 ml-1 mr-1 rounded-lg tombol_pagination 
                    ${i == pageActive ? 'bg-gradient-to-tl from-purple-700 to-pink-500 text-white' : 'text-gray-500'}" 
                    data-no="${i}">
                    ${i}
                </button>`;

                // Tombol prev
                pagination += `
                <button 
                    class="text-center text-gray-500 border p-2 mr-1 rounded-lg tombol_prev 
                    ${pageActive == 1 ? 'opacity-50 cursor-not-allowed' : ''}" 
                    data-no="${pageActive - 1}" ${pageActive == 1 ? 'disabled' : ''}>
                    &laquo;
                </button>`;

                // Tombol halaman tengah
                let start = Math.max(1, pageActive - 2);
                let end = Math.min(totalHalaman, pageActive + 2);

                if (start > 1) {
                    pagination += createBtn(1);
                    if (start > 2) pagination += `<span class="text-gray-400 mx-1">...</span>`;
                }

                for (let i = start; i <= end; i++) {
                    pagination += createBtn(i);
                }

                if (end < totalHalaman) {
                    if (end < totalHalaman - 1) pagination += `<span class="text-gray-400 mx-1">...</span>`;
                    pagination += createBtn(totalHalaman);
                }

                // Tombol next
                pagination += `
                <button 
                    class="text-center text-gray-500 border p-2 ml-1 rounded-lg tombol_next 
                    ${pageActive == totalHalaman ? 'opacity-50 cursor-not-allowed' : ''}" 
                    data-no="${pageActive + 1}" ${pageActive == totalHalaman ? 'disabled' : ''}>
                    &raquo;
                </button>`;

                let awal_data = (hal * perPage) - perPage + 1;
                let akhir_data = hal * perPage;
                showing = `Menampilkan ${awal_data} hingga ${data.total_data < akhir_data ? data.total_data : akhir_data} dari ${data.total_data} data`;
            }

            $("#tabel-pemesanan tbody").html(html);
            $("#load_pagination").html(pagination);
            $("#showing_entri").html(showing);
        }

        function nomer_urut(currentPage, index, perPage) {
            return currentPage * perPage - (perPage - index) + 1;
        }

        // Event: tombol pagination
        $(document).on("click", "#load_pagination .tombol_pagination", function() {
            let no = $(this).data('no');
            let perPage = $("#entri_data").val();
            loadAjaxTabel(no, perPage);
        });

        // Event: ganti jumlah data
        $(document).on("change", "#entri_data", function() {
            let perPage = $(this).val();
            loadAjaxTabel(1, perPage);
        });

        // Event: tombol prev
        $(document).on("click", ".tombol_prev", function() {
            let no = $(this).data('no');
            let perPage = $("#entri_data").val();
            loadAjaxTabel(no, perPage);
        });

        // Event: tombol next
        $(document).on("click", ".tombol_next", function() {
            let no = $(this).data('no');
            let perPage = $("#entri_data").val();
            loadAjaxTabel(no, perPage);
        });
    }

    function initPemesananTabelProses() {
        let timer;

        $(document).ready(function() {
            loadAjaxTabel(1, 10);
        });

        function loadAjaxTabel(hal, perPage) {
            $.ajax({
                type: "get",
                url: "{{ route('show_process') }}",
                data: {
                    hal,
                    perPage
                },
                success: function(response) {
                    $("#tabel-pemesanan-proses tbody").html(`<tr>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center" colspan="7">Menunggu...</td>
                </tr>`);
                    loadTabel(response, hal, perPage);
                }
            });
        }

        function loadTabel(data, hal, perPage) {
            let html = '';
            let pagination = '';
            let showing = '';

            if (data.total_data == 0) {
                html = `<tr>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center" colspan="7">Data tidak ditemukan</td>
            </tr>`;
            } else {
                $.each(data.data, function(i, d) {
                    html += `
                    <tr>
                        <td class="p-2 align-middle bg-transparent border-b border-gray-400 whitespace-nowrap shadow-transparent text-center">${nomer_urut(hal || 1, i, perPage)}</td>
                        <td class="p-2 align-middle bg-transparent border-b border-gray-400 whitespace-nowrap shadow-transparent">${d.lokasi}</td>
                        <td class="p-2 align-middle bg-transparent border-b border-gray-400 whitespace-nowrap shadow-transparent">${d.kontak}</td>
                        <td class="p-2 align-middle bg-transparent border-b border-gray-400 whitespace-nowrap shadow-transparent">${d.tanggal}</td>
                        <td class="p-2 align-middle bg-transparent border-b border-gray-400 whitespace-nowrap shadow-transparent">${d.status}</td>
                    </tr>`;
                });

                let totalHalaman = Math.ceil(data.total_data / perPage);
                let pageActive = hal || 1;

                const createBtn = (i) => `
                <button 
                    class="text-center border p-2 ml-1 mr-1 rounded-lg tombol_pagination_proses 
                    ${i == pageActive ? 'bg-gradient-to-tl from-purple-700 to-pink-500 text-white' : 'text-gray-500'}" 
                    data-no="${i}">
                    ${i}
                </button>`;

                // Tombol prev
                pagination += `
                <button 
                    class="text-center text-gray-500 border p-2 mr-1 rounded-lg tombol_prev_proses 
                    ${pageActive == 1 ? 'opacity-50 cursor-not-allowed' : ''}" 
                    data-no="${pageActive - 1}" ${pageActive == 1 ? 'disabled' : ''}>
                    &laquo;
                </button>`;

                // Tombol halaman tengah
                let start = Math.max(1, pageActive - 2);
                let end = Math.min(totalHalaman, pageActive + 2);

                if (start > 1) {
                    pagination += createBtn(1);
                    if (start > 2) pagination += `<span class="text-gray-400 mx-1">...</span>`;
                }

                for (let i = start; i <= end; i++) {
                    pagination += createBtn(i);
                }

                if (end < totalHalaman) {
                    if (end < totalHalaman - 1) pagination += `<span class="text-gray-400 mx-1">...</span>`;
                    pagination += createBtn(totalHalaman);
                }

                // Tombol next
                pagination += `
                <button 
                    class="text-center text-gray-500 border p-2 ml-1 rounded-lg tombol_next_proses 
                    ${pageActive == totalHalaman ? 'opacity-50 cursor-not-allowed' : ''}" 
                    data-no="${pageActive + 1}" ${pageActive == totalHalaman ? 'disabled' : ''}>
                    &raquo;
                </button>`;

                let awal_data = (hal * perPage) - perPage + 1;
                let akhir_data = hal * perPage;
                showing = `Menampilkan ${awal_data} hingga ${data.total_data < akhir_data ? data.total_data : akhir_data} dari ${data.total_data} data`;
            }

            $("#tabel-pemesanan-proses tbody").html(html);
            $("#load_pagination_proses").html(pagination);
            $("#showing_entri_proses").html(showing);
        }

        function nomer_urut(currentPage, index, perPage) {
            return currentPage * perPage - (perPage - index) + 1;
        }

        // Event: tombol pagination
        $(document).on("click", "#load_pagination_proses .tombol_pagination_proses", function() {
            let no = $(this).data('no');
            let perPage = $("#entri_data_proses").val();
            loadAjaxTabel(no, perPage);
        });

        // Event: ganti jumlah data
        $(document).on("change", "#entri_data_proses", function() {
            let perPage = $(this).val();
            loadAjaxTabel(1, perPage);
        });

        // Event: tombol prev
        $(document).on("click", ".tombol_prev_proses", function() {
            let no = $(this).data('no');
            let perPage = $("#entri_data_proses").val();
            loadAjaxTabel(no, perPage);
        });

        // Event: tombol next
        $(document).on("click", ".tombol_next_proses", function() {
            let no = $(this).data('no');
            let perPage = $("#entri_data_proses").val();
            loadAjaxTabel(no, perPage);
        });
    }
</script>


@endsection