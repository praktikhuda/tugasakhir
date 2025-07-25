@extends('layouts.app')
@section('content')
<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
    <div class="flex items-center justify-between w-full py-1 mx-auto flex-wrap-inherit">
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="opacity-50 text-slate-700" href="javascript:;">Halaman</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Layanan</li>
            </ol>
            <h6 class="mb-0 font-bold capitalize">Layanan</h6>
        </nav>
    </div>
</nav>

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="px-4 py-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex justify-end items-center mb-2">

                    <!-- <h6>Layanan</h6> -->
                    <a class="bg-blue-500 text-white px-3 py-2 rounded-md shadow-md hover:bg-blue-400 cursor-pointer" id="tambah_jenis">Tambah</a>
                </div>
            </div>
            <div class="mx-4 mb-2 flex justify-between">
                <div class="flex justify-stretch">
                    <select name="" id="entri_data" class="border rounded-sm">
                        <option value="10" class="text-center">10</option>
                        <option value="25" class="text-center">25</option>
                        <option value="50" class="text-center">50</option>
                        <option value="100" class="text-center">100</option>
                    </select>
                    <span>&nbsp;entri per halaman</span>
                </div>
                <div class="flex justify-stretch">
                    <span>Cari :&nbsp;</span>
                    <input type="text" class="border rounded-sm" placeholder="" id="cari_nama">
                </div>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2 mt-4 mb-2 mx-4">
                <div class="p-0 overflow-x-auto p-3 border rounded-lg">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500" id="tabel-pemesanan" style="width: 100%;">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70" width="5%">No</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70" width="30%">Jenis</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70" width="30%">Deskripsi</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70" width="25%">Tarif</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70" width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mx-4 mt-2 mb-4 flex justify-between content-center">
                <span id="showing_entri"></span>
                <div class="flex justify-end" id="load_pagination"></div>
            </div>
        </div>
    </div>
</div>

<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden custom-modal fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black/50" style="z-index: 9999;">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    Layanan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center cursor-pointer" data-modal-toggle="crud-modal" id="tutupModal">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <input type="hidden" id="id" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3"></input>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Jenis Layanan</label>
                        <select id="pilih_layanan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3">

                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Deskripsi Layanan</label>
                        <textarea type="text" id="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3"></textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Tarif Layanan</label>
                        <input type="number" id="tarif" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3"></input>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="rounded-md px-3 py-2 text-white cursor-pointer" id="simpan_perubahan" style="background-color: #0006c1;">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="crud-modal-hapus" tabindex="-1" aria-hidden="true" class="hidden custom-modal fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black/50" style="z-index: 9999;">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    Layanan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center cursor-pointer" data-modal-toggle="crud-modal" id="tutupModal">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 border-b rounded-t border-gray-200 flex justify-center">
                <input type="hidden" id="id">
                <img src="{{ asset('assets/img/hapus.png') }}" alt="" width="60%">
            </div>
            <div class="p-4 md:p-5 border-b rounded-t border-gray-200 flex justify-center">
                <button type="button" class="rounded-md px-3 py-2 text-white cursor-pointer mx-2" id="hapus_jenis" style="background-color: #8d0000ff;">
                    Hapus
                </button>
                <button type="button" class="rounded-md px-3 py-2 text-white cursor-pointer mx-2" id="tutupModal" style="background-color: #474747ff;">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    // Tutup modal jika klik tombol close
    $("#crud-modal, #crud-modal-hapus").on("click", "#tutupModal", function() {
        $("#crud-modal, #crud-modal-hapus").addClass('hidden');
        $("body").removeClass('overflow-hidden'); // Aktifkan scroll lagi
    });

    // Tutup modal jika klik di luar konten (area overlay)
    $("#crud-modal, #crud-modal-hapus").on("click", function(e) {
        if (e.target === this) {
            $(this).addClass('hidden');
            $("body").removeClass('overflow-hidden');
        }
    });

    // Fungsi untuk membuka modal
    function bukaModal() {
        $("#crud-modal").removeClass('hidden');
        $("body").addClass('overflow-hidden'); // Kunci scroll
    }

    $(document).on("click", ".ubah_jenis_layanan", function() {
        bukaModal();
        let id = $(this).data("id");
        $("#jenis").val("");
        $("#pilih_layanan").val("");
        $("#deskripsi").val("");

        // Ambil data layanan berdasarkan ID
        $.ajax({
            type: "post",
            url: "{{ route('cari-layanan') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id
            },
            success: function(response) {
                let data = response.data;

                // Parsing string array jadi array JS
                let arr = [];
                try {
                    arr = JSON.parse(data.keterangan.replace(/'/g, '"'));
                } catch (e) {
                    console.error("Error parsing keterangan:", e);
                }

                // Isi textarea deskripsi
                $('#deskripsi').val(arr.join('\n'));

                // Isi input lainnya
                $("#tarif").val(data.tarif);
                $("#id").val(id);

                // Setelah data awal dimuat, baru load dropdown layanan
                $.ajax({
                    type: "get",
                    url: "{{ route('list-jenis-layanan') }}",
                    success: function(res) {
                        let html = '';
                        $.each(res.data, function(i, d) {
                            let selected = (d.id == data.id_jenis) ? 'selected' : '';
                            html += `<option value="${d.id}" ${selected}>${d.jenis}</option>`;
                        });
                        $("#pilih_layanan").html(html);
                    }
                });
            }
        });
    });

    $(document).on("click", ".hapus_jenis_layanan", function() {
        $("#crud-modal-hapus").removeClass('hidden');
        $("body").addClass('overflow-hidden');

        let id = $(this).data("id");
        $("#id").val(id)

    });


    $("#crud-modal").on("click", "#simpan_perubahan", function() {
        let id = $("#id").val();
        let id_jenis = $("#pilih_layanan").val();
        let tarif = $("#tarif").val();
        let des = $("#deskripsi").val();
        let arr = des
            .split('\n')
            .map(item => item.trim())
            .filter(item => item !== '');

        let result = "['" + arr.join("', '") + "']";

        if (id == "") {
            $.ajax({
                type: "post",
                url: "{{ route('tambah-layanan') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id_jenis: id_jenis,
                    deskripsi: String(result),
                    tarif: tarif,
                },
                success: function(response) {
                    if (response.status == 'error') {
                        toastr.error(response.toast);
                    } else {
                        toastr.success(response.toast);
                        $("#crud-modal").addClass('hidden');
                        $("body").removeClass('overflow-hidden');
                        loadAjaxTabel(1, null, 10);
                    }
                }
            });
            return;
        }
        $.ajax({
            type: "post",
            url: "{{ route('edit-layanan') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
                id_jenis: id_jenis,
                deskripsi: String(result),
                tarif: tarif,
            },
            success: function(response) {
                $("#crud-modal").addClass('hidden');
                $("body").removeClass('overflow-hidden');
                toastr.success(response.toast);
                loadAjaxTabel(1, null, 10);
            }
        });
    });

    $(document).on("click", "#tambah_jenis", function() {
        bukaModal();
        $("#id").val("");
        $("#jenis").val("");
        $("#pilih_layanan").val("");
        $("#deskripsi").val("");
        $.ajax({
            type: "get",
            url: "{{ route('list-jenis-layanan') }}",
            success: function(response) {
                let html = '';
                $.each(response.data, function(i, d) {
                    html += `<option value="${d.id}">${d.jenis}</option>`
                })
                $("#pilih_layanan").html(html);
            }
        });
    })


    $(document).on("click", "#hapus_jenis", function() {
        let id = $("#id").val()
        $.ajax({
            type: "post",
            url: "{{ route('hapus-layanan') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id
            },
            success: function(response) {
                $("#crud-modal-hapus").addClass('hidden');
                $("body").removeClass('overflow-hidden');
                toastr.success(response.toast);
                loadAjaxTabel(1, null, 10);
            }
        });
    })
</script>
<script>
    function renderListCell(dataString) {
        let data = JSON.parse(dataString.replace(/'/g, '"'));

        return data.map(item => item).join('<br>');

        return data;
    }

    $(document).ready(function() {
        loadAjaxTabel(1, null, 10);
    })

    function loadAjaxTabel(hal, cari = null, perPage) {
        $.ajax({
            type: "get",
            url: "{{ route('lihat-layanan') }}",
            data: {
                hal: hal,
                cari: cari,
                perPage: perPage
            },
            success: function(response) {
                $("#tabel-pemesanan tbody").html(`<tr>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center" colspan="7">Menunggu...</td>
                </tr>`);
                loadTabel(response, hal, perPage)
            }
        });
    }

    function formatRupiah(angka) {
        let rupiah = Number(angka).toLocaleString("id-ID");
        return rupiah;
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
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">${nomer_urut(hal ? hal : 1, i, perPage)}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${d.jenis}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${renderListCell(d.keterangan)}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-end">${formatRupiah(d.tarif)}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                            <div class="flex justify-center">
                                <a class="group cursor-pointer ubah_jenis_layanan" data-id="${d.id}">
                                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 group-hover:bg-yellow-500 bg-yellow-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-white">
                                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                        </svg>

                                    </div>
                                </a>
                                <a class="group cursor-pointer hapus_jenis_layanan" data-id="${d.id}">
                                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 group-hover:bg-red-500 bg-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-white">
                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>
                    `;
            })

            let totalHalaman = Math.ceil(data.total_data / perPage);
            let pageActive = hal || 1;

            pagination = `
                <button 
                    class="text-center text-gray-500 border p-2 mr-1 rounded-lg tombol_prev 
                    ${pageActive == 1 ? 'opacity-50 cursor-not-allowed' : ''}" 
                    data-no="${pageActive - 1}" ${pageActive == 1 ? 'disabled' : ''}>
                    &laquo;
                </button>
            `;

            const createBtn = (i) => `
                <button 
                    class="text-center border p-2 ml-1 mr-1 rounded-lg tombol_pagination 
                    ${i == pageActive ? 'bg-gradient-to-tl from-purple-700 to-pink-500 text-white' : 'text-gray-500'}" 
                    data-no="${i}">
                    ${i}
                </button>`;

            // Atur batas tampilan tengah seperti DataTables
            let start = Math.max(1, pageActive - 2);
            let end = Math.min(totalHalaman, pageActive + 2);

            // Tambahkan tombol pertama dan ...
            if (start > 1) {
                pagination += createBtn(1);
                if (start > 2) pagination += `<span class="text-gray-400 mx-1">...</span>`;
            }

            // Tombol-tombol di tengah (maks 5)
            for (let i = start; i <= end; i++) {
                pagination += createBtn(i);
            }

            // Tambahkan ... dan tombol terakhir
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
                </button>
            `;

            let awal_data = (hal * perPage) - perPage + 1;
            let akhir_data = hal * perPage;
            showing = `Menampilkan ${awal_data} hingga ${data.total_data < akhir_data ? data.total_data : akhir_data} dari ${data.total_data} data`;
        }
        $("#load_pagination").html(pagination);
        $("#tabel-pemesanan tbody").html(html);
        $("#showing_entri").html(showing);
    }

    function nomer_urut(currentPage, index, perPage) {
        return currentPage * perPage - (perPage - index) + 1;
    }

    $(document).on("click", "#load_pagination .tombol_pagination", function() {
        let no = $(this).data('no');
        let perPage = $("#entri_data").val();

        loadAjaxTabel(no, null, perPage);
    });

    $(document).on("change", "#entri_data", function() {
        let perPage = $("#entri_data").val();
        let value = $("#cari_nama").val().trim();
        loadAjaxTabel(1, value, perPage);
    });

    $(document).on("click", ".tombol_prev", function() {
        const halBaru = parseInt($(this).data("no"));
        const perPage = $("#entri_data").val();
        loadAjaxTabel(halBaru, null, perPage);
    });

    $(document).on("click", ".tombol_next", function() {
        const halBaru = parseInt($(this).data("no"));
        const perPage = $("#entri_data").val();
        loadAjaxTabel(halBaru, null, perPage);
    });


    let timer;

    $("#cari_nama").on("input", function() {
        clearTimeout(timer);

        const value = $(this).val().trim();
        let perPage = $("#entri_data").val();
        $("#tabel-pemesanan tbody").html(`<tr>
            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center" colspan="7">Menunggu...</td>
            </tr>`);
        timer = setTimeout(() => {
            loadAjaxTabel(1, value, perPage);
        }, 1000);
    });
</script>
@endsection