<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesanSekarang;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;

use App\Mail\KirimPesan;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;

class PesanSekarangController extends Controller
{
    public function index()
    {
        //get all posts
        $posts = PesanSekarang::all();


        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $posts);
    }

    public function store(Request $request)
    {
        // Validasi input
        $messages = [
            'namalengkap.required' => 'Nama lengkap wajib diisi.',
            'email.required'       => 'Email wajib diisi.',
            'email.email'          => 'Format email tidak valid.',
            'nomer.required'       => 'Nomor telepon wajib diisi.',
            'tanggal.required'     => 'Tanggal wajib diisi.',
            'tanggal.date'         => 'Format tanggal tidak valid.',
            'layanan.required'     => 'Layanan wajib dipilih.',
        ];

        $validator = Validator::make($request->all(), [
            'namalengkap' => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'nomer'       => 'required|string|max:20',
            'alamat'      => 'required|string|max:255',
            'tanggal'     => 'required|date',
            'layanan'     => 'required|string|max:100',
            'catatan'     => 'nullable|string',
        ], $messages);
        
        $validator->after(function ($validator) use ($request) {
            $tanggal = $request->tanggal;

            $existing = PesanSekarang::where('tanggal', $tanggal)->exists();

            if ($existing) {
                $validator->errors()->add('tanggal', 'Tanggal yang dipilih sudah penuh.');
            }
        });

        if ($validator->fails()) {
            $firstError = $validator->errors()->first();
            return response()->json([
                'success' => false,
                'message' => $firstError,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $kode = strtoupper(Str::random(6));

        // Simpan data
        $post = PesanSekarang::create([
            'namalengkap' => $request->namalengkap,
            'email'       => $request->email,
            'nomer'       => $request->nomer,
            'alamat'      => $request->alamat,
            'tanggal'     => $request->tanggal,
            'layanan'     => $request->layanan,
            'catatan'     => $request->catatan,
            'kode'        => $kode,
            'status'      => 'tunggu',
            'alasan'      => ''
        ]);

        Mail::to($request->email)->send(new KirimPesan($post));


        // Response sukses, bisa pakai PostResource jika tersedia
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan',
            'data'    => $post,
        ]);
    }

    public function cekKode(Request $request)
    {
        // Validasi input
        $messages = [
            'kode.required' => 'Kode wajib diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:255',
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Cek apakah kode ada di tabel
        $pesan = PesanSekarang::where('kode', $request->kode)
            ->where('status', 'tunggu')
            ->first();

        if (!$pesan) {
            return response()->json([
                'success' => false,
                'message' => 'Kode tidak ditemukan',
            ], 404);
        }

        // Jika ditemukan, bisa lanjut (misalnya ambil data atau hanya return true)
        return response()->json([
            'success' => true,
            'message' => 'Kode ditemukan',
        ]);
    }

    public function updateBatalkan(Request $request)
    {
        // Validasi input
        $messages = [
            'kode.required' => 'Kode wajib diisi.',
            'alasan.required' => 'Kode wajib diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:255',
            'alasan' => 'required|string|max:255',
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // Cek apakah kode ada di tabel
        $pesan = PesanSekarang::where('kode', $request->kode)->first();

        if (!$pesan) {
            return response()->json([
                'success' => false,
                'message' => 'Kode tidak ditemukan',
            ], 404);
        }

        // Update status dan alasan
        $pesan->update([
            'status' => 'batal',
            'alasan' => $request->alasan ?? 'Tidak ada alasan'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dibatalkan',
        ]);
    }
}
