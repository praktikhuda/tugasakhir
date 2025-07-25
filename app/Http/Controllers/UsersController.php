<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Layanan;
use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\JenisLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index(Request $request)
    {

        $cari = $request->input('cari');
        $hal = $request->hal;
        $perPage = $request->perPage;
        $data_mulai = ($hal - 1) * $perPage;

        $query = User::leftJoin("pelanggan as pl", "pl.id", "=", "users.id_pelanggan")
            ->leftJoin("karyawan as kr", "kr.id", "=", "users.id_karyawan")
            ->select(
                "users.id",
                "users.user",
                "users.role",
                "users.id_karyawan",
                "users.id_pelanggan",

                // Pelanggan fields
                "pl.nama as pelanggan_nama",
                "pl.alamat as pelanggan_alamat",
                "pl.nomor as pelanggan_nomor",
                "pl.email as pelanggan_email",

                // Karyawan fields
                "kr.nama as karyawan_nama",
                "kr.alamat as karyawan_alamat",
                "kr.nomor as karyawan_nomor",
                "kr.email as karyawan_email",
                "kr.is_teknisi"
            )
            ->orderBy('users.id', 'asc');



        if (!empty($cari)) {
            $query->where('jenis', 'like', '%' . $cari . '%');
            $pesan = $query->skip($data_mulai)->take($perPage)->get();
            $total_data = $query->count();
        } else {
            $pesan = $query->skip($data_mulai)->take($perPage)->get();
            $total_data = JenisLayanan::count();
        }


        return response()->json([
            'data' => $pesan,
            'total_data' => $total_data,
            'halaman' => $hal
        ]);
    }

    public function cari(Request $request)
    {
        $id = anti_injeksi($request->id);

        $cari = User::where('id', $id)->first();

        $query = User::leftJoin("pelanggan as pl", "pl.id", "=", "users.id_pelanggan")
            ->leftJoin("karyawan as kr", "kr.id", "=", "users.id_karyawan")
            ->select(
                "users.id",
                "users.user",
                "users.role",
                "users.id_karyawan",
                "users.id_pelanggan",

                // Pelanggan fields
                "pl.nama as pelanggan_nama",
                "pl.alamat as pelanggan_alamat",
                "pl.nomor as pelanggan_nomor",
                "pl.email as pelanggan_email",

                // Karyawan fields
                "kr.nama as karyawan_nama",
                "kr.alamat as karyawan_alamat",
                "kr.nomor as karyawan_nomor",
                "kr.email as karyawan_email",
                "kr.is_teknisi"
            )
            ->where('users.id', $cari->id)
            ->get();

        return response()->json([
            'status' => 'success',
            'toats' => 'berhasil menemukan data',
            'data' => $query
        ]);
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'   => 'required',
            'nama'   => 'required',
            'username'   => 'required',
            'email'   => 'required',
            'alamat'   => 'required',
            'nomor'   => 'required',
            'role'   => 'required',
            'is_teknisi'   => 'required',
            'password'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'toast'  => 'Harus diisi semua dengan benar.'
            ]);
        }

        $id   = anti_injeksi($request->id);
        $nama   = anti_injeksi($request->nama);
        $username   = anti_injeksi($request->username);
        $email   = anti_injeksi($request->email);
        $alamat   = anti_injeksi($request->alamat);
        $nomor   = anti_injeksi($request->nomor);
        $role   = anti_injeksi($request->role);
        $is_teknisi   = anti_injeksi($request->is_teknisi);
        $password   = anti_injeksi($request->password);

        $id_user = User::where('id', $id)->first();
        // dd($id_user->id_pelanggan);

        if ($id_user->role === 'pelanggan') {
            $pelanggan = Pelanggan::find($id_user->id_pelanggan);
            // dd($pelanggan);
            $pelanggan->nama = $nama;
            $pelanggan->email = $email;
            $pelanggan->alamat = $alamat;
            $pelanggan->nomor = $nomor;
            $pelanggan->updated_at = now();
            $pelanggan->save();

        } else {
            $karyawan = Karyawan::find($id_user->id_karyawan);
            $karyawan->nama = $nama;
            $karyawan->email = $email;
            $karyawan->alamat = $alamat;
            $karyawan->nomor = $nomor;
            $karyawan->is_teknisi = $is_teknisi === 'teknisi' ? true : false;
            $karyawan->updated_at = now();
            $karyawan->save();
        }

        $user = User::findOrFail($id);
        $user->user = $username;
        $user->role = $role;
        // $user->pass = $password;
        $user->updated_at = now();
        $user->save();


        return response()->json([
            'status' => 'success',
            'toast'  => 'user berhasil diedit.'
        ]);

        // Update jenislayanan
        $jenislayanan = JenisLayanan::findOrFail($id);
        $jenislayanan->jenis = $jenis;
        $jenislayanan->updated_at = now();
        $jenislayanan->save();

        return response()->json([
            'status' => 'success',
            'toast'  => 'user berhasil diperbarui.'
        ]);
    }

    public function tambah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'username'   => 'required',
            'email'   => 'required',
            'alamat'   => 'required',
            'nomor'   => 'required',
            'role'   => 'required',
            'is_teknisi'   => 'required',
            'password'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'toast'  => 'Harus diisi semua dengan benar.'
            ]);
        }

        $nama   = anti_injeksi($request->nama);
        $username   = anti_injeksi($request->username);
        $email   = anti_injeksi($request->email);
        $alamat   = anti_injeksi($request->alamat);
        $nomor   = anti_injeksi($request->nomor);
        $role   = anti_injeksi($request->role);
        $is_teknisi   = anti_injeksi($request->is_teknisi);
        $password   = anti_injeksi($request->password);


        if ($role === 'pelanggan') {
            $detail = Pelanggan::create([
                'nama'       => $nama,
                'alamat'     => $alamat,
                'nomor'      => $nomor,
                'email'      => $email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $id_pelanggan = $detail->id;
            $id_karyawan = null;
        } else {
            $detail = Karyawan::create([
                'nama'       => $nama,
                'alamat'     => $alamat,
                'nomor'      => $nomor,
                'email'      => $email,
                'is_teknisi' => $is_teknisi === 'teknisi',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $id_pelanggan = null;
            $id_karyawan = $detail->id;
        }

        User::create([
            'user'         => $username,
            'pass'         => Hash::make($password),
            'role'         => $role,
            'id_pelanggan' => $id_pelanggan,
            'id_karyawan'  => $id_karyawan,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);


        return response()->json([
            'status' => 'success',
            'toast'  => 'user berhasil ditambahakan.'
        ]);
    }

    public function hapus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'toast'  => 'ID tidak valid atau tidak ditemukan.',
            ]);
        }

        // Cari dan hapus data
        $user = User::find($request->id);
        // dd($user);

        if ($user->id_pelanggan == null) {
            $karyawan = Karyawan::find($user->id_karyawan);
            // dd($karyawan);
            $karyawan->delete();
            $user->delete();
        } else {
            $pelanggan = Pelanggan::find($user->id_pelanggan);
            // dd($pelanggan);
            $pelanggan->delete();
            $user->delete();
        }

        if ($user) {
            $user->delete();

            return response()->json([
                'status' => 'success',
                'toast'  => 'user berhasil dihapus.',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'toast'  => 'Data tidak ditemukan.',
            ]);
        }
    }
}
