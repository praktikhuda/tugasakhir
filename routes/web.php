<?php

use App\Mail\KirimPesan;
use Illuminate\Http\Request;
use App\Models\PesanSekarang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesanSekarangController;

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

// MODAL
Route::get('/modal-detail', function () {
    return view('landing-page.modal.detail-v1');
});

// LANDING PAGE

Route::get('/', function () {
    return view("landing-page/index");
})->name('beranda');

Route::get('/tentang-kami', function () {
    return view("landing-page/tentang");
})->name('tentang-kami');

Route::get('/layanan', function () {
    return view("landing-page/index");
})->name('layanan');

Route::get('/kontak-kami', function () {
    return view("landing-page/tentang");
})->name('kontak-kami');

Route::get('/latihan', function () {
    return view("landing-page/latihan");
});
Route::get('/pesan-sekarang', function () {
    return view("landing-page/pesan-sekarang");
});

Route::get('/pesan-batal', function () {
    return view("landing-page/pesan-batal");
});

Route::get('/masuk', function () { return view('landing-page.login'); })->name('masuk');
Route::get('/daftar', function () { return view('landing-page.daftar'); })->name('daftar');

// CRUD PESAN SEKARANG
Route::get('/posts', [PesanSekarangController::class, 'index']);
Route::post('/tambah', [PesanSekarangController::class, 'store']);
Route::post('/cekKode', [PesanSekarangController::class, 'cekKode']);
Route::post('/updateBatalkan', [PesanSekarangController::class, 'updateBatalkan']);

Route::get('/viewapp', function () {
    return view("dashboard");
});
// Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/app', [MenuController::class, 'index'])->name('menu');

// Route::get('keamanan', function () {
//     $statusFile = storage_path('app/site_status.json');
//     $status = json_decode(file_get_contents($statusFile), true)['status'] ?? 'on';

//     return view('keamanan', compact('status'));
// });

// Route::post('keamanan/update', function (Request $request) {
//     $statusFile = storage_path('app/site_status.json');
//     file_put_contents($statusFile, json_encode(['status' => $request->input('status')]));

//     return redirect('keamanan');
// });