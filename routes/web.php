<?php

use App\Mail\KirimPesan;
use Illuminate\Http\Request;
use App\Models\PesanSekarang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PesanSekarangController;
use App\Models\JenisLayanan;
use App\Models\Pemesanan;

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

Route::get('/modal/detail-v2', function () {
    return view('landing-page.modal.detail-v2');
});
Route::get('/modal/detail-v3', function () {
    return view('landing-page.modal.detail-v3');
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

Route::get('/layanan', function () {
    return view("landing-page/layanan");
})->name('layanan');

Route::get('/kalender', function () {
    return view("landing-page/kalender");
})->name('kalender');

Route::get('/kontak-kami', function () {
    return view("landing-page/tentang");
})->name('kontak-kami');


Route::get('/getpesan', [PesanSekarangController::class, 'listPesanan']);

Route::get('/pesan-batal', function () {
    return view("landing-page/pesan-batal");
});

Route::get('/pesanan', [PemesananController::class, 'index']);

// CRUD PESAN SEKARANG
Route::get('/posts', [PesanSekarangController::class, 'index']);
Route::post('/tambah', [PesanSekarangController::class, 'store']);
Route::post('/cekKode', [PesanSekarangController::class, 'cekKode']);
Route::post('/updateBatalkan', [PesanSekarangController::class, 'updateBatalkan']);

Route::get('/viewapp', function () {
    return view("dashboard");
})->name('viewapp');

Route::middleware(['auth'])->group(function () {
    Route::get('/getLayanan', [LandingPageController::class, 'index'])->name('getLayanan');
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
        Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
        Route::post('/send_otp', [AuthController::class, 'send_otp'])->name('auth.send_otp');

        Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    }    
);

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');