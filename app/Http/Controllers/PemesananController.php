<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesanSekarang;
use App\Http\Resources\PostResource;

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

        $query = PesanSekarang::orderBy('id', 'asc');

        
        if (!empty($cari)) {
            $query->where('namalengkap', 'like', '%' . $cari . '%');
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
}
