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
                <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Pesanan</li>
            </ol>
            <h6 class="mb-0 font-bold capitalize">Pesanan</h6>
        </nav>
    </div>
</nav>

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="px-4 py-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex justify-between items-center mb-2">
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
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500" id="tabel-dash-teknisi" style="width: 100%;">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70" width="5%">No</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Pemesan</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Layanan</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Lokasi</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Kontak</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Teknisi</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
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
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    Detail dash-teknisi
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center cursor-pointer" data-modal-toggle="crud-modal" id="tutupModal">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <input type="hidden" id="id" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3"></input>
                    <div class="">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Kode Pesanan</label>
                        <input type="text" id="kode" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" disabled></input>
                    </div>
                    <div class="">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Nama</label>
                        <input type="text" id="nama" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" disabled></input>
                    </div>
                    <div class="">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Email</label>
                        <input type="text" id="email" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" disabled></input>
                    </div>
                    <div class="">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Kontak</label>
                        <input type="text" id="kontak" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" disabled></input>
                    </div>
                    <div class="">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Layanan</label>
                        <input type="text" id="jenis" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" disabled></input>
                    </div>
                    <div class="">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Tanggal</label>
                        <input type="text" id="tanggal" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" disabled></input>
                    </div>
                    <div class="">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Status</label>
                        <input type="text" id="status" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" disabled></input>
                    </div>
                    <div class="">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Lokasi</label>
                        <input type="text" id="lokasi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" disabled></input>
                    </div>
                    <div class="">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Keterangan</label>
                        <textarea type="text" id="keterangan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" disabled></textarea>
                    </div>
                    <div class="">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Catatan</label>
                        <textarea type="text" id="catatan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" disabled></textarea>
                    </div>
                    <div class="">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Alasan Pembatalan (jika dibatalkan)</label>
                        <textarea type="text" id="alasan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" disabled></textarea>
                    </div>
                    <div class="">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Teknisi</label>
                        <textarea type="text" id="teknisi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" disabled></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="crud-modal-hapus" tabindex="-1" aria-hidden="true" class="hidden custom-modal fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black/50" style="z-index: 9999;">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    Status dash-teknisi
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center cursor-pointer" data-modal-toggle="crud-modal" id="tutupModal">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 border-b rounded-t border-gray-200">
                <input type="hidden" id="id" rows="4"></input>
                <div class="col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Status</label>
                    <select name="" id="status_mo" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3">
                        <option value="tunggu">Tunggu</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                        <option value="batal">Batal</option>
                    </select>
                </div>
                <div class="col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Teknisi</label>
                    <select id="pilih_tek" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 py-2 px-3" name="states[]" multiple="multiple" disabled>

                    </select>
                </div>
            </div>
            <div class="p-4 md:p-5 rounded-t flex justify-end">
                <button type="button" class="rounded-md px-3 py-2 text-white cursor-pointer mx-2 bg-blue-500 hover:bg-blue-700" id="simpan_perubahan" style="background-color: #1200b1ff;">
                    Simpan
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

    $(document).on("click", ".detail_jenis_layanan", function() {
        bukaModal();
        let id = $(this).data("id");

        // Ambil data layanan berdasarkan ID
        $.ajax({
            type: "post",
            url: "{{ route('cari-dash-teknisi') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id
            },
            success: function(response) {
                let d = response.data[0]
                let arr = [];
                try {
                    arr = JSON.parse(d.keterangan.replace(/'/g, '"'));
                } catch (e) {
                    console.error("Error parsing keterangan:", e);
                }

                // Isi textarea deskripsi
                $('#keterangan').val(arr.join('\n'));
                $("#kode").val(d.kode);
                $("#nama").val(d.nama);
                $("#email").val(d.email);
                $("#kontak").val(d.kontak);
                $("#jenis").val(d.jenis);
                $("#tanggal").val(d.tanggal);
                $("#status").val(d.status);
                $("#lokasi").val(d.lokasi);
                $("#catatan").val(d.catatan);
                $("#alasan").val(d.alasan);

                const selectedTeknisiNames = response.teknisi.map(tek => tek.nama);
                const hasilGabung = selectedTeknisiNames.join('\n');

                $('#teknisi').val(hasilGabung); // ini kalau #teknisi adalah input biasa

            }
        });
    });

    $(document).on("click", ".ubah_jenis_layanan", function() {
        $("#crud-modal-hapus").removeClass('hidden');
        $("body").addClass('overflow-hidden');

        let id = $(this).data("id");
        let tanggal = $(this).data("tanggal");
        $("#id").val(id)

        $.ajax({
            type: "post",
            url: "{{ route('cari-teknisi') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
                tanggal: tanggal
            },
            success: function(response) {
                $('#pilih_tek').empty();

                // Loop data teknisi dan tambahkan sebagai option
                response.data.forEach(function(tek) {
                    $('#pilih_tek').append('<option value="' + tek.id + '">' + tek.nama + '</option>');
                });

                const selectedTeknisiIds = [];

                // Tambahkan option dan kumpulkan ID yang harus dipilih
                response.teknisi.forEach(function(tek) {
                    $('#pilih_tek').append('<option value="' + tek.id + '">' + tek.nama + '</option>');
                    selectedTeknisiIds.push(String(tek.id));
                });

                // Inisialisasi atau re-inisialisasi select2
                $('#pilih_tek').select2({
                    dropdownParent: $('#crud-modal-hapus')
                });

                // Set value yang terpilih
                setTimeout(function() {
                    $('#pilih_tek').val(selectedTeknisiIds).trigger('change');
                }, 50);
            }
        });

    });


    $("#crud-modal-hapus").on("click", "#simpan_perubahan", function() {
        let id = $("#id").val();
        let status = $("#status_mo").val();
        let pilih_tek = $("#pilih_tek").val();
        console.log(pilih_tek);


        $.ajax({
            type: "post",
            url: "{{ route('edit-dash-teknisi') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
                status: status,
                teknisi: pilih_tek,
            },
            success: function(response) {

                $("#crud-modal-hapus").addClass('hidden');
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
            url: "{{ route('hapus-jenis-layanan') }}",
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
            url: "{{ route('get-dash-teknisi') }}",
            data: {
                username: sessionData.username,
                hal: hal,
                cari: cari,
                perPage: perPage
            },
            success: function(response) {
                $("#tabel-dash-teknisi tbody").html(`<tr>
                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center" colspan="9">Menunggu...</td>
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

                let teknisiHTML;
                if (d.nama_teknisi_ditugaskan != null) {
                    teknisiHTML = d.nama_teknisi_ditugaskan
                        .split(',')
                        .map(nama => `<div>${nama.trim()}<br></div>`)
                        .join('');
                }
                html += `
                    <tr>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">${nomer_urut(hal ? hal : 1, i, perPage)}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${d.nama_pelanggan}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${d.jenis}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${d.lokasi}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${d.kontak}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${d.tanggal}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                            <span class="bg-${d.status == 'selesai' ? 'green' : d.status == 'proses' ? 'blue' : d.status == 'batal' ? 'red' : 'yellow'}-500 rounded-xl py-1 px-3 text-white text-sm">${d.status}</span>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-start">
                            ${d.nama_teknisi_ditugaskan != null ? teknisiHTML : 'Belum memilih teknisi'}
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                            <div class="flex justify-center">
                                <a class="group cursor-pointer ubah_jenis_layanan ${d.status == 'selesai' || d.status == 'batal' ? 'hidden' : ''}" data-id="${d.id_pesanan}" data-tanggal="${d.tanggal}" data-status="${d.status}">
                                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 group-hover:bg-yellow-500 bg-yellow-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-white">
                                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                        </svg>

                                    </div>
                                </a>
                                <a class="group cursor-pointer detail_jenis_layanan" data-id="${d.id_pesanan}">
                                    <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5 group-hover:bg-green-500 bg-green-700">
                                       
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-white">
                                            <path d="M11.625 16.5a1.875 1.875 0 1 0 0-3.75 1.875 1.875 0 0 0 0 3.75Z" />
                                            <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 0 0 1.06-1.06l-1.047-1.048A3.375 3.375 0 1 0 11.625 18Z" clip-rule="evenodd" />
                                            <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
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
        $("#tabel-dash-teknisi tbody").html(html);
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
        $("#tabel-dash-teknisi tbody").html(`<tr>
            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center" colspan="9">Menunggu...</td>
            </tr>`);
        timer = setTimeout(() => {
            loadAjaxTabel(1, value, perPage);
        }, 1000);
    });
</script>
@endsection