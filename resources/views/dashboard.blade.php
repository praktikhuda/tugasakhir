@extends('layouts.app')
@section('content')

<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
    <div class="flex items-center justify-between w-full py-1 mx-auto flex-wrap-inherit">
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="mb-0 font-bold capitalize">Dashboard</h6>
        </nav>
    </div>
</nav>

<!-- row 1 -->
<div class="flex flex-wrap -mx-3 mb-6">
    <!-- card1 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 text-sm font-semibold leading-normal">Today's Money</p>
                            <h5 class="mb-0 font-bold">
                                $53,000
                                <span class="text-sm leading-normal font-weight-bolder text-lime-500">+55%</span>
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                            <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card2 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 text-sm font-semibold leading-normal">Today's Users</p>
                            <h5 class="mb-0 font-bold">
                                2,300
                                <span class="text-sm leading-normal font-weight-bolder text-lime-500">+3%</span>
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                            <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card3 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 text-sm font-semibold leading-normal">New Clients</p>
                            <h5 class="mb-0 font-bold">
                                +3,462
                                <span class="text-sm leading-normal text-red-600 font-weight-bolder">-2%</span>
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                            <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card4 -->
    <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 text-sm font-semibold leading-normal">Sales</p>
                            <h5 class="mb-0 font-bold">
                                $103,430
                                <span class="text-sm leading-normal font-weight-bolder text-lime-500">+5%</span>
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                            <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="px-4 py-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Pemesanan</h6>
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
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500" id="tabel-pemesanan">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Email</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Whatsapp</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Layana</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
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


@endsection

@section('js')
<script>
    $(document).ready(function() {
        loadAjaxTabel(1, null, 10);
    })

    function loadAjaxTabel(hal, cari = null, perPage) {
        $.ajax({
            type: "get",
            url: "/pesanan",
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
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${nomer_urut(hal ? hal : 1, i, perPage)}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${d.namalengkap}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${d.email}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${d.nomer}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${d.layanan}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">${d.status}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"></td>
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
            showing = `Menampilkan ${awal_data} hingga ${akhir_data} dari ${data.total_data} data`;
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