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
                <div class="grid items-stretch gap-y-10 md:grid-cols-2 md:gap-x-5 px-6 py-12 sm:p-12">
                    <div id="calendar"></div>
                    <form class="">
                        <p class="text-5xl mb-10">Informasi</p>
                        <p class="font-medium uppercase">Tanggal Pemesanan</p>
                        <p class="text-2xl font-medium text-blue-950 capitalize mb-5" id="pilihtanggal">Silahkan Pilih Tanggal</p>
                        <input type="hidden" value="" id="pilih_val_tanggal" name="pilihtanggal">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-5 gap-y-4">
                            <div class="sm:col-span-2">
                                <label for="" class="text-base font-medium text-gray-900 required">Email</label>
                                <div class="mt-2.5 relative">
                                    <input type="email" name="email" id="email" placeholder="" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600" required />
                                    <p class="text-red-600" id="alertnomer"></p>
                                </div>
                            </div>
                            <div>
                                <label for="" class="text-base font-medium text-gray-900 required">Kontak</label>
                                <div class="mt-2.5 relative">
                                    <input type="number" name="nomer" id="nomer" placeholder="" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600" required />
                                    <p class="text-red-600" id="alertnomer"></p>
                                </div>
                            </div>

                            <div>
                                <label for="" class="text-base font-medium text-gray-900 required">Lokasi</label>
                                <div class="mt-2.5 relative">
                                    <input type="text" name="alamat" id="alamat" placeholder="" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600" required />
                                    <p class="text-red-600" id="alertalamat"></p>
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="" class="text-base font-medium text-gray-900 required">Pilih Layanan</label>
                                <div class="mt-2.5 relative">
                                    <select name="layanan" id="layanan" required class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-blue-600" required>
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

<script>
    const loadLayanan = () => {
        const username = "{{ session('username') }}";
        console.log(username);
        if (username) {
            $.ajax({
                type: "get",
                url: "{{ route('profil') }}",
                success: function(response) {
                    $('#email').val(response.data.email);
                    $('#alamat').val(response.data.alamat);
                    $('#nomer').val(response.data.nomor);
                }
            });
        }

        $.ajax({
            type: "get",
            url: "{{ route('getLayanan') }}",
            success: function(response) {
                let html = '<option value="">pilih layanan</option>';
                $.each(response.data, function(i, d) {
                    let detail = d.keterangan.join(' ');

                    html += `
                        <option value="${d.id}">${d.jenis_nama + ' ' + detail}</option>
                    `;
                });

                $("#layanan").html(html);
            }
        });

    }

    $("#tambahpesanan").on("click", function() {
        const btn = $(this);
        btn.prop("disabled", true);

        toastr.info('Mohon tunggu..');

        const email = $('#email').val().trim();

        const id_layanan = $('#layanan').val().trim();
        const lokasi = $('#alamat').val().trim();
        const tanggal = $('#pilih_val_tanggal').val().trim();
        const kontak = $('#nomer').val().trim();
        const catatan = $('#catatan').val().trim();


        $.ajax({
            type: "POST",
            url: "/tambah",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                email: email,
                kontak: kontak,
                lokasi: lokasi,
                tanggal: tanggal,
                id_layanan: id_layanan,
                catatan: catatan
            },
            dataType: "json",
            success: function(response) {
                toastr.success(response.toast);
                const username = "{{ session('username') }}";
                if (username) {
                    window.location.href = "{{ route('dashboard') }}";
                } else {
                    window.location.href = "{{ route('kalender') }}";
                }
            },
            error: function(xhr, status, error) {
                btn.prop("disabled", false);


                let errorMessage = "Terjadi kesalahan. Silakan coba lagi.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                // console.log();

                toastr.error(xhr.responseJSON.toast);
            }
        });
    })
</script>

<script>
    // CALENDAR
    $(document).ready(function() {
        loadLayanan();
        FullCalendar.globalLocales.push(function() {
            'use strict';

            var id = {
                code: "id",
                week: {
                    dow: 1, // Monday is the first day of the week.
                    doy: 7 // The week that contains Jan 1st is the first week of the year.
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


                const jumlah = dataMap[formatTanggal];
                if (jumlah >= 3) {
                    $("#toats").prepend(toats('Sudah penuh', 'gagal', 'red'));
                    setTimeout(function() {
                        $("#toats").html('');
                    }, 3000);
                    return;
                }
                var tgl_t = info.date;
                fnSelectDate(tgl_t);
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

                // Tambahkan ikon kalender
                icon.style.fontSize = '22px';
                icon.style.color = jumlah >= 3 ? 'red' : '#007bff';
                icon.style.fontSize = '20px';
                icon.style.position = 'absolute';
                icon.style.top = '50%';
                icon.style.left = '50%';
                icon.style.transform = 'translate(-50%, -50%)';
                icon.style.pointerEvents = 'none';

                // Tambahkan teks jumlah/penuh
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

    function fnSelectDate(tgl) {
        const tanggal = new Date(tgl);

        const options = {
            weekday: 'long',
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        };

        const formatTanggal = tanggal.toLocaleDateString('id-ID', options);

        const year = tanggal.getFullYear();
        const month = String(tanggal.getMonth() + 1).padStart(2, '0'); // +1 karena 0 = Januari
        const day = String(tanggal.getDate()).padStart(2, '0');

        const formatted = `${year}-${month}-${day}`;

        $("#pilihtanggal").text(formatTanggal);
        $("#pilih_val_tanggal").val(formatted)
    }
</script>


@endsection