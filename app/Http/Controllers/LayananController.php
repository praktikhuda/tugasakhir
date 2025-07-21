<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        // $layanan = JenisLayanan::get();
        // return response()->json([
        //     'success' => true,
        //     'message' => 'list data',
        //     'data'    => $layanan,
        // ]);

        $cari = $request->input('cari');      // kata kunci pencarian
        $hal = $request->hal;
        $perPage = $request->perPage;
        $data_mulai = ($hal - 1) * $perPage;

        $query = JenisLayanan::orderBy('id', 'asc');


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
            'jenis'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'toast'  => 'Harus diisi semua dengan benar.'
            ]);
        }

        $jenis   = anti_injeksi($request->jenis);

        // Update jenislayanan
        JenisLayanan::create([
            'jenis' => $jenis,
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

    public function lihat(Request $request)
    {
        $cari = $request->input('cari');
        $hal = $request->hal;
        $perPage = $request->perPage;
        $data_mulai = ($hal - 1) * $perPage;

        $query = Layanan::leftJoin('jenis_layanan', 'jenis_layanan.id', '=', 'layanan.id_jenis')
                ->select('layanan.id', 'layanan.id_jenis', 'jenis_layanan.jenis', 'layanan.keterangan', 'layanan.tarif')
                ->orderBy('layanan.id', 'asc');


        if (!empty($cari)) {
            $query->where('jenis', 'like', '%' . $cari . '%');
            $pesan = $query->skip($data_mulai)->take($perPage)->get();
            $total_data = $query->count();
        } else {
            $pesan = $query->skip($data_mulai)->take($perPage)->get();
            $total_data = Layanan::count();
        }


        return response()->json([
            'data' => $pesan,
            'total_data' => $total_data,
            'halaman' => $hal
        ]);
    }

    public function cari_layanan(Request $request)
    {
        $id = $request->id;

        $cari = Layanan::leftJoin('jenis_layanan', 'jenis_layanan.id', '=', 'layanan.id_jenis')
            ->where('layanan.id', $id)
            ->first();

        return response()->json([
            'status' => 'success',
            'toats' => 'berhasil menemukan data',
            'data' => $cari
        ]);
    }

    public function list_jenis_layanan()
    {
       
        $cari = JenisLayanan::get();

        return response()->json([
            'status' => 'success',
            'toats' => 'berhasil menemukan data',
            'data' => $cari
        ]);
    }

    public function tambah_layanan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jenis'   => 'required',
            'deskripsi'   => 'required',
            'tarif'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'toast'  => 'Harus diisi semua dengan benar.'
            ]);
        }

        $id_jenis   = anti_injeksi($request->id_jenis);
        $deskripsi   = $request->deskripsi;
        $tarif   = anti_injeksi($request->tarif);

        // Update jenislayanan
        Layanan::create([
            'id_jenis' => $id_jenis,
            'keterangan' => $deskripsi,
            'tarif' => $tarif,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return response()->json([
            'status' => 'success',
            'toast'  => 'jenis layanan berhasil ditambahakan.'
        ]);
    }

    public function edit_layanan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'required',
            'id_jenis'   => 'required',
            'deskripsi'   => 'required',
            'tarif'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'toast'  => 'Harus diisi semua dengan benar.'
            ]);
        }

        $id     = anti_injeksi($request->id);
        $id_jenis   = anti_injeksi($request->id_jenis);
        $deskripsi   = $request->deskripsi;
        $tarif   = anti_injeksi($request->tarif);

        // Update jenislayanan
        $jenislayanan = Layanan::findOrFail($id);
        $jenislayanan->id_jenis = $id_jenis;
        $jenislayanan->keterangan = $deskripsi;
        $jenislayanan->tarif = $tarif;
        $jenislayanan->updated_at = now();
        $jenislayanan->save();

        return response()->json([
            'status' => 'success',
            'toast'  => 'layanan berhasil diperbarui.'
        ]);
    }
}
