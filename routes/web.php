<?php

use App\Models\Layanan;
use App\Mail\KirimPesan;
use App\Models\Pemesanan;
use App\Models\JenisLayanan;
use Illuminate\Http\Request;
use App\Models\PesanSekarang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardTeknisiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PesanSekarangController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/modal-detail', function () {
    return view('landing-page.modal.detail-v1');
});
Route::get('/modal/detail-v2', function () {
    return view('landing-page.modal.detail-v2');
});
Route::get('/modal/detail-v3', function () {
    return view('landing-page.modal.detail-v3');
});

Route::get('/modal/detail-v4', function () {
    return view('landing-page.modal.detail-v4');
});


// LANDING PAGE
Route::get('/', function () {
    return view("landing-page/index");
})->name('beranda');

Route::get('/tentang-kami', function () {
    return view("landing-page/tentang");
})->name('tentang-kami');

Route::get('/pesan-sekarang', function () {
    return view("landing-page/pesan-sekarang");
})->name('pesan-sekarang');

Route::get('/cek-layanan', function () {
    return view("landing-page/layanan");
})->name('cek-layanan');

Route::get('/kalender', function () {
    return view("landing-page/kalender");
})->name('kalender');

Route::get('/kontak-kami', function () {
    return view("landing-page/tentang");
})->name('kontak-kami');


Route::get('/getpesan', [PesanSekarangController::class, 'listPesanan']);
Route::post('/listDetailPesanan', [PesanSekarangController::class, 'listDetailPesanan']);

Route::get('/pesan-batal', function () {
    return view("landing-page/pesan-batal");
});

Route::get('/pesanan', [PemesananController::class, 'index']);

// CRUD PESAN SEKARANG
Route::get('/posts', [PesanSekarangController::class, 'index']);
Route::post('/tambah', [PesanSekarangController::class, 'store']);
Route::post('/cekKode', [PesanSekarangController::class, 'cekKode']);
Route::post('/updateBatalkan', [PesanSekarangController::class, 'updateBatalkan']);


Route::get('/getLayanan', [LandingPageController::class, 'index'])->name('getLayanan');

Route::middleware(['auth'])->prefix('dash')->group(function () {

    // DASHBOARD
    Route::get('/viewapp', function () {
        return view("dashboard");
    })->name('viewapp');
    Route::get('/layanan', function () {
        return view("layanan");
    })->name('layanan');


    Route::get('/jenis-layanan', function () {
        return view("jenis-layanan");
    })->name('jenis-layanan');

    Route::get('/users', function () {
        return view("users");
    })->name('users');

    Route::get('/pemesanan', function () {
        return view("pemesanan");
    })->name('pemesanan');

    Route::get('/pemesanan-teknisi', function () {
        return view("pemesanan_teknisi");
    })->name('pemesanan-teknisi');


    Route::get('/get-jenis-layanan', [LayananController::class, 'index'])->name('get-jenis-layanan');
    Route::post('/cari-jenis-layanan', [LayananController::class, 'cari'])->name('cari-jenis-layanan');
    Route::post('/edit-jenis-layanan', [LayananController::class, 'edit'])->name('edit-jenis-layanan');
    Route::post('/tambah-jenis-layanan', [LayananController::class, 'tambah'])->name('tambah-jenis-layanan');
    Route::post('/hapus-jenis-layanan', [LayananController::class, 'hapus'])->name('hapus-jenis-layanan');

    Route::get('/lihat-layanan', [LayananController::class, 'lihat'])->name('lihat-layanan');
    Route::post('/cari-layanan', [LayananController::class, 'cari_layanan'])->name('cari-layanan');
    Route::get('/list-jenis-layanan', [LayananController::class, 'list_jenis_layanan'])->name('list-jenis-layanan');
    Route::post('/tambah-layanan', [LayananController::class, 'tambah_layanan'])->name('tambah-layanan');
    Route::post('/edit-layanan', [LayananController::class, 'edit_layanan'])->name('edit-layanan');
    Route::post('/hapus-layanan', [LayananController::class, 'hapus_layanan'])->name('hapus-layanan');

    Route::get('/get-users', [UsersController::class, 'index'])->name('get-users');
    Route::post('/cari-users', [UsersController::class, 'cari'])->name('cari-users');
    Route::post('/edit-users', [UsersController::class, 'edit'])->name('edit-users');
    Route::post('/tambah-users', [UsersController::class, 'tambah'])->name('tambah-users');
    Route::post('/hapus-users', [UsersController::class, 'hapus'])->name('hapus-users');

    Route::get('/get-pemesanan', [PemesananController::class, 'index'])->name('get-pemesanan');
    Route::post('/cari-pemesanan', [PemesananController::class, 'cari'])->name('cari-pemesanan');
    Route::post('/cari-teknisi', [PemesananController::class, 'cari_teknisi'])->name('cari-teknisi');
    Route::post('/cari-data-teknisi', [PemesananController::class, 'cari_ji'])->name('cari-data-teknisi');
    Route::post('/edit-pemesanan', [PemesananController::class, 'edit'])->name('edit-pemesanan');
    Route::post('/tambah-pemesanan', [PemesananController::class, 'tambah'])->name('tambah-pemesanan');
    Route::post('/hapus-pemesanan', [PemesananController::class, 'hapus'])->name('hapus-pemesanan');
    Route::get('/dashboard-pemesanan', [PemesananController::class, 'dashboard'])->name('dashboard-pemesanan');

    Route::get('/get-dash-teknisi', [DashboardTeknisiController::class, 'index'])->name('get-dash-teknisi');
    Route::post('/cari-dash-teknisi', [DashboardTeknisiController::class, 'cari'])->name('cari-dash-teknisi');
    Route::post('/cari-teknisi', [DashboardTeknisiController::class, 'cari_teknisi'])->name('cari-teknisi');
    Route::post('/cari-data-teknisi', [DashboardTeknisiController::class, 'cari_ji'])->name('cari-data-teknisi');
    Route::post('/edit-dash-teknisi', [DashboardTeknisiController::class, 'edit'])->name('edit-dash-teknisi');
    Route::post('/tambah-dash-teknisi', [DashboardTeknisiController::class, 'tambah'])->name('tambah-dash-teknisi');
    Route::post('/hapus-dash-teknisi', [DashboardTeknisiController::class, 'hapus'])->name('hapus-dash-teknisi');
    Route::get('/dashboard-dash-teknisi', [DashboardTeknisiController::class, 'dashboard'])->name('dashboard-dash-teknisi');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [LandingPageController::class, 'show_profil'])->name('profil');
    Route::post('/update_profil', [LandingPageController::class, 'update_profil'])->name('update_profil');
    Route::post('/update_password', [LandingPageController::class, 'update_password'])->name('update_password');
    Route::get('/show_riwayat', [LandingPageController::class, 'show_riwayat'])->name('show_riwayat');
    Route::get('/show_process', [LandingPageController::class, 'show_process'])->name('show_process');

    Route::get('/dashboard', function () {
        return view("landing-page/dashboard");
    })->name('dashboard');
});

Route::middleware(['guest'])->prefix('auth')->group(
    function () {
        Route::get('/masuk', [AuthController::class, 'index'])->name('auth.masuk');
        Route::get('/daftar', [AuthController::class, 'daftar'])->name('auth.daftar');
        Route::post('/cek_user', [AuthController::class, 'cek'])->name('cek_user');
        Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
        Route::post('/send_otp', [AuthController::class, 'send_otp'])->name('auth.send_otp');
        
        Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    }
);

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
