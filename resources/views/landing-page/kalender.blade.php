@extends('landing-page.layouts.app')
@section('content')
<section class="py-15 bg-gray-700 -mt-8">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl pt-8">
        <div class="mx-auto text-center">
            <h2 class="text-4xl uppercase font-normal leading-tight text-white">cek jadwal</h2>
            <div class="mt-4 flex items-center justify-center gap-2">
                <a class="capitalize text-md font-semibold text-white cursor-pointer" href="#">
                    Beranda
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="w-3 h-3 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
                <p class="capitalize text-md font-semibold text-white">
                    Cek jadwal
                </p>
            </div>

        </div>
    </div>
</section>

<section class="py-10 bg-gray-50 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 p-3 bg-white">
        <div id="calendar"></div>
        <div class="mt-3">
            <a href="/pesan-batal" class="text-blue-700 underline underline-offset-1">Klik jika ingin membatalkan pesanan..</a>
        </div>
    </div>
</section>

<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden custom-modal fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black/50" style="z-index: 9999;">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    Users
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center cursor-pointer" data-modal-toggle="crud-modal" id="tutupModal">
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <table class="min-w-full text-sm text-left text-gray-900 border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border-b">Nama</th>
                            <th class="px-4 py-2 border-b">Alamat</th>
                            <th class="px-4 py-2 border-b">Kontak</th>
                        </tr>
                    </thead>
                    <tbody id="detail-kalendar">
                        <!-- Isi akan dimasukkan lewat JavaScript -->
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


<script>
    // Tutup modal jika klik tombol close
    $("#crud-modal").on("click", "#tutupModal", function() {
        $("#crud-modal").addClass('hidden');
        $("body").removeClass('overflow-hidden');
    });

    // Fungsi untuk membuka modal
    function bukaModal() {
        $("#crud-modal").removeClass('hidden');
        $("body").addClass('overflow-hidden');
    }
    // CALENDAR
    $(document).ready(function() {
        FullCalendar.globalLocales.push(function() {
            'use strict';

            var id = {
                code: "id",
                week: {
                    dow: 1,
                    doy: 7
                },
                buttonText: {
                    prev: "Mundur",
                    next: "Maju",
                    today: "Hari ini",
                    month: "Bulan",
                    week: "Minggu",
                    day: "Hari",
                    list: "Agenda"
                },
                weekText: "Mg",
                allDayText: "Sehari penuh",
                moreLinkText: "lebih",
                noEventsText: "Tidak ada acara untuk ditampilkan"
            };

            return id;

        }());

        let hasilArray = []; // ← diisi dari AJAX
        let dataMap = {}; // ← key = tanggal, value = jumlah

        $.ajax({
            type: "get",
            url: "/getpesan",
            dataType: "json",
            success: function(response) {
                const countByTanggal = {};

                response.data.forEach(d => {
                    const tgl = d.tanggal;
                    countByTanggal[tgl] = (countByTanggal[tgl] || 0) + 1;
                });

                hasilArray = Object.entries(countByTanggal).map(([tanggal, jumlah]) => ({
                    tanggal,
                    jumlah
                }));

                dataMap = Object.fromEntries(
                    hasilArray.map(item => [item.tanggal, item.jumlah])
                );

                calendar.render();
            }
        });

        const now = new Date();
        const start = new Date(now.getFullYear(), now.getMonth() - 1, 1);
        const end = new Date(now.getFullYear(), now.getMonth() + 2, 0);

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'id',
            initialView: 'dayGridMonth',
            dateClick: function(info) {
                const date = info.date;

                if (date < start || date > end) {
                    return;
                }

                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                const formatTanggal = `${year}-${month}-${day}`;
                
                $.ajax({
                    type: "post",
                    url: "/listDetailPesanan",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        tanggal: formatTanggal
                    },
                    success: function(response) {
                        let html = '';
                        if (response.data.length > 0) {
                            $.each(response.data, function(i, d) {
                                html += `
                                    <tr class="border-b">
                                        <td class="px-4 py-2">${d.nama == null ? 'Anonimus' : d.nama}</td>
                                        <td class="px-4 py-2">${d.lokasi}</td>
                                        <td class="px-4 py-2">${d.kontak}</td>
                                    </tr>
                                `;
                            });
                        } else {
                            html += `
                                    <tr class="border-b">
                                        <td class="px-4 py-2" colspan="3">Data Tidak ditemukan</td>
                                    </tr>
                                `;
                        }

                        $("#crud-modal #detail-kalendar").html(html);
                        bukaModal();
                    }
                });

            },
            eventClick: function(info) {
                var tgl_t = info.event.extendedProps.tanggal;
            },
            eventClassNames: function(info) {
                return ['fc-custom-center']
            },
            eventContent: function(info) {
                return {
                    html: info.event.extendedProps.lbl
                }
            },
            eventDidMount: function(info) {

                var evdata = info.event.extendedProps;
                arr[evdata.tanggal] = evdata.id_jadwal;

            },
            dayCellDidMount: function(info) {
                const date = info.date;

                const now = new Date();
                const start = new Date(now.getFullYear(), now.getMonth() - 1, 1);
                const end = new Date(now.getFullYear(), now.getMonth() + 2, 0);

                if (date < start || date > end) {
                    return;
                }

                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                const formatTanggal = `${year}-${month}-${day}`;

                const jumlah = dataMap[formatTanggal];

                const icon = document.createElement('i');
                icon.className = 'fa-solid fa-calendar-check';

                const teks = document.createElement('p');
                teks.textContent = jumlah >= 3 ? 'PENUH' : `${jumlah || 0} BOOKING`;

                icon.style.fontSize = '20px';
                icon.style.color = jumlah >= 3 ? 'red' : '#007bff';
                icon.style.position = 'absolute';
                icon.style.top = '50%';
                icon.style.left = '50%';
                icon.style.transform = 'translate(-50%, -50%)';
                icon.style.pointerEvents = 'none';

                teks.style.fontSize = '12px';
                teks.style.color = jumlah >= 3 ? 'red' : '#007bff';
                teks.style.position = 'absolute';
                teks.style.bottom = '10px';
                teks.style.left = '50%';
                teks.style.transform = 'translateX(-50%)';
                teks.style.margin = '0';
                teks.style.pointerEvents = 'none';

                info.el.style.position = 'relative';
                info.el.appendChild(icon);
                info.el.appendChild(teks);
            },
            eventMouseEnter: function(mouseEnterInfo) {},
            eventMouseLeave: function(mouseEnterInfo) {}
        });
    })
</script>


@endsection