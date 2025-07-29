<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\KirimOtp;
use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\SendOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
        $this->middleware('auth', ['only' => ['logout']]);
    }

    public function index()
    {
        return view('landing-page/login');
    }
    public function daftar()
    {
        return view('landing-page/daftar');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'      => 'required',
            'nama'      => 'required',
            'alamat'      => 'required',
            'nomor'      => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'errors'     => $validator->errors(),
                'toast'     => 'harus diisi semua'
            ]);
        }

        $email = anti_injeksi($request->email);

        $count = DB::table('send_otp')->where('email', $email)->count();

        if ($count > 3) {
            return response()->json([
                'status' => 'error',
                'toast'  => 'email sudah melakukan beberapa kali verifikasi'
            ]);
        }

        $kode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $post = SendOtp::create([
            'email'       => $email,
            'kode'        => $kode,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        Mail::to($email)->send(new KirimOtp($post));

        return response()->json([
            'status'    => 'success',
            'toast'     => 'otp berhasil ke kirim, mohon cek email'
        ]);
    }

    public function send_otp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'      => 'required',
            'user'      => 'required',
            'nama'      => 'required',
            'alamat'      => 'required',
            'nomor'      => 'required',
            'password'      => 'required',
            'otp'      => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'errors'     => $validator->errors(),
                'toast'     => 'harus diisi semua'
            ]);
        }

        $email = anti_injeksi($request->email);
        $pass = anti_injeksi($request->password);
        $nama = anti_injeksi($request->nama);
        $alamat = anti_injeksi($request->alamat);
        $nomor = anti_injeksi($request->nomor);
        $user = anti_injeksi($request->user);
        $otp = anti_injeksi($request->otp);

        $otp = DB::table('send_otp')->where('email', $email)->where('kode', $otp)->first();

        if (!$otp) {
            return response()->json([
                'status'    => 'error',
                'toast'     => 'otp salah'
            ]);
        }

        DB::table('send_otp')->where('id', $otp->id)->delete();

        // Simpan ke tabel `pelanggan`
        $pelanggan = Pelanggan::create([
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'nomor' => $nomor,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        // Simpan ke tabel `users`
        User::create([
            'user' => $user,
            'pass'     => Hash::make($pass),
            'role' => 'pelanggan',
            'id_pelanggan' => $pelanggan->id,
            'id_karyawan' => 0,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return response()->json([
            'status'    => 'success',
            'toast'     => 'pendaftaran berhasil'
        ]);
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'      => 'required',
            'password'      => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'errors'     => $validator->errors(),
                'toast'     => 'harus diisi semua'
            ]);
        }

        $username = anti_injeksi($request->username);
        $pass = anti_injeksi($request->password);

        $isEmail = filter_var($username, FILTER_VALIDATE_EMAIL);


        if ($isEmail) {
            $pelanggan = DB::table('pelanggan')->where('email', $username)->first();

            if ($pelanggan) {
                $user = DB::table('users')->where('id_pelanggan', $pelanggan->id)->first();
            } else {
                $karyawan = DB::table('karyawan')->where('email', $username)->first();

                if ($karyawan) {
                    $user = DB::table('users')->where('id_karyawan', $karyawan->id)->first();
                } else {
                    return response()->json([
                        'status' => 'error',
                        'toast'  => 'username tidak di temukan',
                    ]);
                }
            }
        } else {
            $user = DB::table('users')->where('user', $username)->first();
            $karyawan = DB::table('karyawan')->where('id', $user->id_karyawan)->first();
        }

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'toast'  => 'akun pengguna tidak ditemukan!'
            ]);
        }


        if (!Hash::check($pass, $user->pass)) {
            return response()->json([
                'status' => 'error',
                'toast'  => 'Password salah!'
            ]);
        }

        $role = '';
        // dd($karyawan);
        if ($user->role == 'karyawan') {
            $karyawan->is_teknisi ? $role = 'teknisi' : $role = $user->role;
        } else {
            $role = $user->role;
        }

        // dd($role);

        $request->session()->regenerate();

        Session::put([
            'username'    => $username,
            'role' => $role
        ]);


        return response()->json([
            'status' => 'success',
            'toast'  => 'login berhasil'
        ]);
    }

    public function cek(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user'      => 'required',
            'email'      => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'errors'     => $validator->errors(),
                'toast'     => 'harus diisi semua'
            ]);
        }

        $user = anti_injeksi($request->user);
        $email = anti_injeksi($request->email);

        $cek = User::select('user')->where('user', $user)->get();
        if ($cek->isEmpty()) {

            $cekPelanggan = Pelanggan::where('email', $email)->exists();
            $cekKaryawan  = Karyawan::where('email', $email)->exists();

            if (!$cekPelanggan && !$cekKaryawan) {
                return response()->json([
                    'status' => 'success',
                    'toast'  => 'username atau email belum dipakai'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'toast'  => 'email sudah dipakai'
                ]);
            }

        } else {
            return response()->json([
                'status' => 'error',
                'toast'  => 'username sudah dipakai'
            ]);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('auth.masuk'));
    }
}
