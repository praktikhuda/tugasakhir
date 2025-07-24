<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\PesanTeknisi;
use Illuminate\Http\Request;
use App\Models\PesanSekarang;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller
{
    // public function index (Request $request)
    // {
    //     // $hal = $request->mulai;
    //     $hal = $request->hal ? $request->hal : 1;
    //     $total_data = PesanSekarang::count();
    //     $data_mulai = $hal * 10 - 10;

    //     $pesan = PesanSekarang::orderBy('id', 'asc')
    //         ->skip($data_mulai)
    //         ->take(10)
    //         ->get();

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'List Pemesanan',
    //         'data' => $pesan,
    //         'total_data' => $total_data
    //     ]);
    // }
    public function index(Request $request)
    {
        $cari = $request->input('cari');      // kata kunci pencarian
        $hal = $request->hal;
        $perPage = $request->perPage;
        $data_mulai = ($hal - 1) * $perPage;

        $query = PesanSekarang::leftJoin('layanan as l', 'l.id', '=', 'pesan_sekarangs.id_layanan')
            ->leftJoin('jenis_layanan as jl', 'jl.id', '=', 'l.id_jenis')
            ->leftJoin('pelanggan as p', 'p.id', '=', 'pesan_sekarangs.id_pelanggan')
            ->leftJoin('pesan_teknisi as pt', 'pesan_sekarangs.id', '=', 'pt.id_pesan')
            ->leftJoin('karyawan', 'pt.id_teknisi', '=', 'karyawan.id')
            ->select(
                'p.nama AS nama_pelanggan',
                'jl.jenis',
                'pesan_sekarangs.lokasi',
                'pesan_sekarangs.kontak',
                'pesan_sekarangs.tanggal',
                'pesan_sekarangs.status',
                'pesan_sekarangs.id AS id_pesanan',
                DB::raw('STRING_AGG(karyawan.nama, \', \') AS nama_teknisi_ditugaskan')
            )
            ->groupBy(
                'p.nama',
                'jl.jenis',
                'pesan_sekarangs.lokasi',
                'pesan_sekarangs.kontak',
                'pesan_sekarangs.tanggal',
                'pesan_sekarangs.status',
                'pesan_sekarangs.id'
            )
            ->orderBy('pesan_sekarangs.id', 'asc');

        if (!empty($cari)) {
            $query->where('p.nama', 'like', '%' . $cari . '%');
            $pesan = $query->skip($data_mulai)->take($perPage)->get();
            $total_data = $query->count();
        } else {
            $pesan = $query->skip($data_mulai)->take($perPage)->get();
            $total_data = PesanSekarang::count();
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

        $query = PesanSekarang::leftJoin('layanan as l', 'l.id', '=', 'pesan_sekarangs.id_layanan')
            ->leftJoin('jenis_layanan as jl', 'jl.id', '=', 'l.id_jenis')
            ->leftJoin('pelanggan as p', 'p.id', '=', 'pesan_sekarangs.id_pelanggan')
            ->select(
                'kode',
                'p.nama',
                'p.email',
                'kontak',
                'jl.jenis',
                'tanggal',
                'status',
                'lokasi',
                'catatan',
                'alasan',
                'l.keterangan',
                'pesan_sekarangs.id'
            )
            ->where('pesan_sekarangs.id', $id)
            ->get();

        $teknisi = PesanTeknisi::where('id_pesan', $id)
            ->select('nama', 'k.id')
            ->leftJoin('karyawan AS k', 'k.id', '=', 'pesan_teknisi.id_teknisi')
            ->get();

        return response()->json([
            'status' => 'success',
            'toats' => 'berhasil menemukan data',
            'data' => $query,
            'teknisi' => $teknisi
        ]);
    }

    public function cari_teknisi(Request $request)
    {
        $tanggal = $request->tanggal;
        $id = $request->id;
        $availableTechnicians = Karyawan::select('karyawan.id', 'karyawan.nama')
            ->leftJoin('pesan_teknisi AS pt', 'karyawan.id', '=', 'pt.id_teknisi')
            ->leftJoin('pesan_sekarangs AS ps', 'pt.id_pesan', '=', 'ps.id')
            ->groupBy('karyawan.id', 'karyawan.nama')
            ->havingRaw('COUNT(CASE WHEN ps.tanggal = ? THEN 1 ELSE NULL END) = 0', [$tanggal])
            ->get();

        $query = PesanTeknisi::where('id_pesan', $id)
            ->select('nama', 'k.id')
            ->leftJoin('karyawan AS k', 'k.id', '=', 'pesan_teknisi.id_teknisi')
            ->get();
        // dd($query);

        return response()->json([
            'status' => 'success',
            'toats' => 'berhasil menemukan data',
            'data' => $availableTechnicians,
            'teknisi' => $query
        ]);
    }

    public function cari_ji(Request $request)
    {
        $tanggal = $request->tanggal;
        $availableTechnicians = Karyawan::select('karyawan.id', 'karyawan.nama')
            ->leftJoin('pesan_teknisi AS pt', 'karyawan.id', '=', 'pt.id_teknisi')
            ->leftJoin('pesan_sekarangs AS ps', 'pt.id_pesan', '=', 'ps.id')
            ->groupBy('karyawan.id', 'karyawan.nama')
            ->havingRaw('COUNT(CASE WHEN ps.tanggal = ? THEN 1 ELSE NULL END) = 0', [$tanggal])
            ->get();

        return response()->json([
            'status' => 'success',
            'toats' => 'berhasil menemukan data',
            'data' => $availableTechnicians
        ]);
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'required',
            'status'   => 'required',
            'teknisi'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'toast'  => 'Harus diisi semua dengan benar.'
            ]);
        }

        $id     = anti_injeksi($request->id);
        $status   = anti_injeksi($request->status);
        // $teknisi   = $request->teknisi;


        // Update jenislayanan
        $pesan = PesanSekarang::findOrFail($id);
        $pesan->status = $status;
        $pesan->updated_at = now();
        $pesan->save();

        // Hapus semua teknisi sebelumnya
        PesanTeknisi::where('id_pesan', $id)->delete();

        // Insert yang baru
        foreach ($request->teknisi as $id_teknisi) {
            PesanTeknisi::insert([
                'id_pesan' => $id,
                'id_teknisi' => $id_teknisi,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        return response()->json([
            'status' => 'success',
            'toast'  => 'berhasil diperbarui.'
        ]);
    }
}
