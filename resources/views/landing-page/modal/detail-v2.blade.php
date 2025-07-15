<div id="crud-modal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black/50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    Edit Profil
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
                    <input type="hidden" id="id"></input>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Nama</label>
                        <input type="text" id="nama" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></input>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Alamat</label>
                        <input type="text" id="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></input>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Nomor</label>
                        <input type="text" id="nomor" rows="4" class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></input>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 required">Email</label>
                        <input type="text" id="email" disabled 
                        class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-100 text-gray-500 cursor-not-allowed">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer" id="simpan_perubahan">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Tutup modal jika klik tombol close
    $("#tutupModal").on("click", function() {
        $("#crud-modal").addClass('hidden');
        $("body").removeClass('overflow-hidden'); // Aktifkan scroll lagi
    });

    // Tutup modal jika klik di luar konten (area overlay)
    $("#crud-modal").on("click", function(e) {
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

    $("#simpan_perubahan").on("click", function() {
        toastr.info('Mohon tunggu...');

        let id = $("#id").val();
        let nama = $("#nama").val();
        let alamat = $("#alamat").val();
        let nomor = $("#nomor").val();
        let email = $("#email").val();

        $.ajax({
            type: "post",
            url: "{{ route('update_profil') }}",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
                nama: nama,
                alamat: alamat,
                nomor: nomor,
                email: email
            },
            success: function(response) {
                if (response.status == 'error') {
                    toastr.error(response.toast);
                } else {
                    const toast = toastr.success(response.toast);

                    // Tutup modal dulu
                    $("#crud-modal").addClass('hidden');
                    $("body").removeClass('overflow-hidden');

                    load_detail()
                }
            }
        });

    })
</script>