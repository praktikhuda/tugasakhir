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
        // const tanggal = $('#tanggal').val().trim();
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

        // if (tanggal === "") {
        //     $("#alerttanggal").text("Tanggal tidak boleh kosong!");
        //     isValid = false;
        // } else {
        //     $("#alerttanggal").text("");
        // }

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
                _token: $('meta[name="csrf-token"]').attr('content'),
                namalengkap: nama,
                email: email,
                nomer: nomer,
                alamat: alamat,
                tanggal: "2025-07-02",
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

<script>
    // CALENDAR
    $(document).ready(function() {
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

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'id',
            initialView: 'dayGridMonth',

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