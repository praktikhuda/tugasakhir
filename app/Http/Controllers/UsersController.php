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
        $id = $request->id;

        $cari = JenisLayanan::where('id', $id)->first();

        return response()->json([
            'status' => 'success',
            'toats' => 'berhasil menemukan data',
            'data' => $cari
        ]);
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'required',
            'jenis'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'toast'  => 'Harus diisi semua dengan benar.'
            ]);
        }

        $id     = anti_injeksi($request->id);
        $jenis   = anti_injeksi($request->jenis);

        // Update jenislayanan
        $jenislayanan = JenisLayanan::findOrFail($id);
        $jenislayanan->jenis = $jenis;
        $jenislayanan->updated_at = now();
        $jenislayanan->save();

        return response()->json([
            'status' => 'success',
            'toast'  => 'jenis layanan berhasil diperbarui.'
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
            'toast'  => 'jenis layanan berhasil ditambahakan.'
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
        $jenis = JenisLayanan::find($request->id);

        if ($jenis) {
            $jenis->delete();

            return response()->json([
                'status' => 'success',
                'toast'  => 'Jenis layanan berhasil dihapus.',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'toast'  => 'Data tidak ditemukan.',
            ]);
        }
    }
}
