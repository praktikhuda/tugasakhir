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
                            <p class="mb-0 text-sm font-semibold leading-normal">Pesanan Tunggu</p>
                            <h5 class="mb-0 font-bold" id="status_tunggu">
                                1
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3 flex justify-end">
                        <div class="flex justify-center items-center w-12 h-12 text-center rounded-lg text-white" style="background-color: #f0b100;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                            </svg>
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
                            <p class="mb-0 text-sm font-semibold leading-normal">Pesanan Proses</p>
                            <h5 class="mb-0 font-bold" id="status_proses">
                                2
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3 flex justify-end">
                        <div class="flex justify-center items-center w-12 h-12 text-center rounded-lg text-white" style="background-color: #2b7fff">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 0 0 0 1.5H3v10.5a3 3 0 0 0 3 3h1.21l-1.172 3.513a.75.75 0 0 0 1.424.474l.329-.987h8.418l.33.987a.75.75 0 0 0 1.422-.474l-1.17-3.513H18a3 3 0 0 0 3-3V3.75h.75a.75.75 0 0 0 0-1.5H2.25Zm6.54 15h6.42l.5 1.5H8.29l.5-1.5Zm8.085-8.995a.75.75 0 1 0-.75-1.299 12.81 12.81 0 0 0-3.558 3.05L11.03 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l2.47-2.47 1.617 1.618a.75.75 0 0 0 1.146-.102 11.312 11.312 0 0 1 3.612-3.321Z" clip-rule="evenodd" />
                            </svg>
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
                            <p class="mb-0 text-sm font-semibold leading-normal">Pesanan Selesai</p>
                            <h5 class="mb-0 font-bold" id="status_selesai">
                                3
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3 flex justify-end">
                        <div class="flex justify-center items-center w-12 h-12 text-center rounded-lg text-white" style="background-color: #00c951 ;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z" clip-rule="evenodd" />
                            </svg>
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
                            <p class="mb-0 text-sm font-semibold leading-normal">Pesanan Batal</p>
                            <h5 class="mb-0 font-bold" id="status_batal">
                                4
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3 flex justify-end">
                        <div class="flex justify-center items-center w-12 h-12 text-center rounded-lg text-white" style="background-color: #fb2c36;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                                <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5 px-3 bg-white">
    <div id="container_chart"></div>
</div>


@endsection

@section('js')
<script>
    $(document).ready(function() {
        // console.log(sessionData.username);
        
        $.ajax({
            type: "get",
            url: sessionData.role == 'karyawan' ? "{{ route('dashboard-pemesanan') }}" : "{{ route('dashboard-dash-teknisi') }}",
            success: function(response) {
                loadchart(response.data)
                // console.log(response.data.statu);
                let totalTunggu = 0;
                let totalProses = 0;
                let totalSelesai = 0;
                let totalBatal = 0;

                $.each(response.data, function(i, d) {
                    d.status == 'tunggu' ? totalTunggu++ : '';
                    d.status == 'proses' ? totalProses++ : '';
                    d.status == 'selesai' ? totalSelesai++ : '';
                    d.status == 'batal' ? totalBatal++ : '';
                });

                $("#status_tunggu").text(totalTunggu);
                $("#status_proses").text(totalProses);
                $("#status_selesai").text(totalSelesai);
                $("#status_batal").text(totalBatal);

            }
        });

        function loadchart(rawData) {
            const stats = {};

            rawData.forEach(item => {
                const month = item.tanggal.slice(5, 7);
                if (!stats[month]) {
                    stats[month] = {
                        selesai: 0,
                        batal: 0
                    };
                }

                if (item.status === 'selesai') stats[month].selesai++;
                if (item.status === 'batal') stats[month].batal++;
            });

            const monthNames = {
                '01': 'Januari',
                '02': 'Februari',
                '03': 'Maret',
                '04': 'April',
                '05': 'Mei',
                '06': 'Juni',
                '07': 'Juli',
                '08': 'Agustus',
                '09': 'September',
                '10': 'Oktober',
                '11': 'November',
                '12': 'Desember'
            };

            const monthKeys = Object.keys(stats).sort(); // ['01', '07', ...]
            const categories = monthKeys.map(m => monthNames[m]);
            const dataSelesai = monthKeys.map(month => stats[month].selesai);
            const dataBatal = monthKeys.map(month => stats[month].batal);


            // 3. Render chart
            Highcharts.chart('container_chart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Status Selesai dan Batal per Bulan',
                    align: 'left',
                    style: {
                        fontFamily: "Poppins"
                    }
                },
                xAxis: {
                    categories: categories,
                    title: {
                        text: 'Bulan'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Status'
                    }
                },
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                },
                series: [{
                    name: 'Selesai',
                    data: dataSelesai,
                    color: '#28a745'
                }, {
                    name: 'Batal',
                    data: dataBatal,
                    color: '#dc3545'
                }],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 600
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            });
        }


    })
</script>

@endsection