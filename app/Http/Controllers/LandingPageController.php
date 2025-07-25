<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\PesanSekarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LandingPageController extends Controller
{
    public function index()
    {
        $posts = Layanan::leftJoin('jenis_layanan', 'layanan.id_jenis', '=', 'jenis_layanan.id')
            ->select('layanan.*', 'jenis_layanan.jenis as jenis_nama')
            ->get();

        $posts = $posts->map(function ($item) {
            $json = str_replace("'", '"', $item->keterangan);
            $item->keterangan = json_decode($json, true);
            return $item;
        });

        return response()->json([
            'success' => true,
            'message' => 'list data',
            'data'    => $posts,
        ]);
    }

    public function show_profil(Request $req)
    {

        $username = session('username');
        // $username = 'praktikhuda@gmail.com';

        $isEmail = filter_var($username, FILTER_VALIDATE_EMAIL);

        if ($isEmail) {
            $id = Pelanggan::where('email', $username)->first();
            $user = User::leftJoin('pelanggan', 'users.id_pelanggan', '=', 'pelanggan.id')
                ->where('users.id_pelanggan', $id->id)
                ->select('pelanggan.id', 'nama', 'alamat', 'nomor', 'email')
                ->first();
        } else {
            $id= User::where('user', $username)->first();
            $user = Pelanggan::leftJoin('users', 'users.id_pelanggan', '=', 'pelanggan.id')
                ->where('pelanggan.id', $id->id_pelanggan)
                ->select('pelanggan.id', 'nama', 'alamat', 'nomor', 'email')
                ->first();
        }

        // dd($user);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'toast'  => 'akun pengguna tidak ditemukan!'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'list data user',
            'data'    => $user,
        ]);
    }

    public function update_profil(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'required',
            'nama'   => 'required',
            'alamat' => 'required',
            'nomor'  => 'required',
            'email'  => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'toast'  => 'Harus diisi semua dengan benar.'
            ]);
        }

        $id     = anti_injeksi($request->id);
        $nama   = anti_injeksi($request->nama);
        $alamat = anti_injeksi($request->alamat);
        $nomor  = anti_injeksi($request->nomor);
        $email  = anti_injeksi($request->email);

        // Update user
        $user = Pelanggan::findOrFail($id);
        $user->nama = $nama;
        $user->alamat      = $alamat;
        $user->nomor       = $nomor;
        $user->email       = $email;
        $user->save();

        return response()->json([
            'status' => 'success',
            'toast'  => 'Profil berhasil diperbarui.'
        ]);
    }

    public function update_password(Request $request)
    {
        $username = session('username');
        // $username = 'praktikhuda@gmail.com';

        $validator = Validator::make($request->all(), [
            'password'     => 'required',
            'password_baru'   => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'toast'  => 'Harus diisi semua dengan benar.'
            ]);
        }

        $isEmail = filter_var($username, FILTER_VALIDATE_EMAIL);

        if ($isEmail) {
            $id = Pelanggan::where('email', $username)->first();
            $user = User::leftJoin('pelanggan', 'users.id_pelanggan', '=', 'pelanggan.id')
                ->where('users.id_pelanggan', $id->id)
                ->select('users.id', 'users.pass')
                ->first();
        } else {
            $user = User::where('user', $username)->select('id', 'pass')->first();
        }

        $password     = anti_injeksi($request->password);
        $password_baru   = anti_injeksi($request->password_baru);

        if (!Hash::check($password, $user->pass)) {
            return response()->json([
                'status' => 'error',
                'toast'  => 'Password salah!'
            ]);
        }

        $user = User::findOrFail($user->id);
        $user->pass = Hash::make($password_baru);
        $user->save();

        return response()->json([
            'status' => 'success',
            'toast'  => 'Password berhasil diperbarui.'
        ]);
    }

    public function show_riwayat(Request $request)
    {
        $hal = $request->hal;
        $perPage = $request->perPage;
        $data_mulai = ($hal - 1) * $perPage;
        
        $username = session('username');
        // $username = 'samsul';

        $isEmail = filter_var($username, FILTER_VALIDATE_EMAIL);

        if ($isEmail) {
            $id = Pelanggan::where('email', $username)->first();
            $pesan = PesanSekarang::leftJoin('pelanggan', 'pesan_sekarangs.id_pelanggan', '=', 'pelanggan.id')
                ->where('pesan_sekarangs.id_pelanggan', $id->id)
                ->whereIn('status', ['selesai', 'batal'])
                ->select('pesan_sekarangs.*')
                ->orderBy('id', 'asc')
                ->get();
            $total_data = $pesan->count();
            $pesan->skip($data_mulai)->take($perPage);
        } else {
            $id = User::where('user', $username)->select('id_pelanggan')->first();
            $pesan = PesanSekarang::leftJoin('users', 'pesan_sekarangs.id_pelanggan', '=', 'users.id_pelanggan')
                ->where('pesan_sekarangs.id_pelanggan', $id->id_pelanggan)
                ->whereIn('status', ['selesai', 'batal'])
                ->select('pesan_sekarangs.*')
                ->orderBy('id', 'asc')
                ->get();
            $total_data = $pesan->count();
            $pesan->skip($data_mulai)->take($perPage);
        }


        return response()->json([
            'data' => $pesan,
            'total_data' => $total_data,
            'halaman' => $hal
        ]);
    }

    public function show_process(Request $request)
    {
        $hal = $request->hal;
        $perPage = $request->perPage;
        $data_mulai = ($hal - 1) * $perPage;

        $username = session('username');
        // $username = 'samsul';

        $isEmail = filter_var($username, FILTER_VALIDATE_EMAIL);

        if ($isEmail) {
            $id = Pelanggan::where('email', $username)->first();
            $pesan = PesanSekarang::leftJoin('pelanggan', 'pesan_sekarangs.id_pelanggan', '=', 'pelanggan.id')
                ->where('pesan_sekarangs.id_pelanggan', $id->id)
                ->whereIn('status', ['tunggu', 'proses'])
                ->select('pesan_sekarangs.*')
                ->orderBy('id', 'asc')
                ->get();
            $total_data = $pesan->count();
            $pesan->skip($data_mulai)->take($perPage);
        } else {
            $id = User::where('user', $username)->select('id_pelanggan')->first();
            $pesan = PesanSekarang::leftJoin('users', 'pesan_sekarangs.id_pelanggan', '=', 'users.id_pelanggan')
                ->where('pesan_sekarangs.id_pelanggan', $id->id_pelanggan)
                ->whereIn('status', ['tunggu', 'proses'])
                ->select('pesan_sekarangs.*')
                ->orderBy('id', 'asc')
                ->get();
            $total_data = $pesan->count();
            $pesan->skip($data_mulai)->take($perPage);
        }


        return response()->json([
            'data' => $pesan,
            'total_data' => $total_data,
            'halaman' => $hal
        ]);
    }
}
