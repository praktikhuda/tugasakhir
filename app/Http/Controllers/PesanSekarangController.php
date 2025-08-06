<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;

use App\Mail\KirimPesan;
use App\Models\Pelanggan;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\PesanSekarang;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
            'kontak.required'       => 'Nomor kontak wajib diisi.',
            'tanggal.required'     => 'Tanggal wajib diisi.',
            'tanggal.date'         => 'Format tanggal tidak valid.',
            'id_layanan.required'     => 'Layanan wajib dipilih.',
        ];

        $validator = Validator::make($request->all(), [
            'kontak'       => 'required|string|max:20',
            'lokasi'      => 'required|string|max:255',
            'tanggal'     => 'required|date',
            'id_layanan'     => 'required|string|max:100',
            'catatan'     => 'nullable|string',
        ], $messages);

        $validator->after(function ($validator) use ($request) {
            $tanggal = $request->tanggal;

            $existing = PesanSekarang::where('tanggal', $tanggal)->exists();

            if ($existing) {
                return response()->json([
                    'status'    => 'error',
                    'toast'     => 'tanggal yang dipilih sudah penuh.'
                ]);
            }
        });

        if ($validator->fails()) {
            $firstError = $validator->errors()->first();
            return response()->json([
                'status'    => 'error',
                'toast'     => $firstError,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $email = anti_injeksi($request->email);
        $id_layanan = anti_injeksi($request->id_layanan);
        $lokasi = anti_injeksi($request->lokasi);
        $tanggal = anti_injeksi($request->tanggal);
        $kontak = anti_injeksi($request->kontak);
        $catatan = anti_injeksi($request->catatan);

        $kode = strtoupper(Str::random(6));

        // Simpan data
        // dd($request->all());
        $username = session('username');
        // $username = 'praktikhuda@gmail.com';

        if ($username) {
            $isEmail = filter_var($username, FILTER_VALIDATE_EMAIL);

            if ($isEmail) {
                $id = Pelanggan::where('email', $username)->first();
                $user = User::leftJoin('pelanggan', 'users.id_pelanggan', '=', 'pelanggan.id')
                    ->where('users.id_pelanggan', $id->id)
                    ->select('users.id_pelanggan')
                    ->first();
            } else {
                $user = User::where('user', $username)
                    ->select('users.id_pelanggan')
                    ->first();
            }

            // dd($user);

            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'toast'  => 'akun pengguna tidak ditemukan!'
                ]);
            }
        }



        $post = PesanSekarang::create([
            'id_layanan'   => $id_layanan,
            'id_pelanggan' => $user->id_pelanggan ?? 0,
            'lokasi'      => $lokasi,
            'tanggal'     => $tanggal,
            'kontak'       => $kontak,
            'catatan'     => $catatan,
            'status'      => 'tunggu',
            'kode'        => $kode,
            'alasan'      => '',
            'id_teknisi'      => 0,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        Mail::to($email)->send(new KirimPesan($post));


        // Response sukses, bisa pakai PostResource jika tersedia
        return response()->json([
            'status'    => 'success',
            'toast' => 'Data berhasil ditambahkan',
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

    // public function listPesanan()
    // {
    //     $posts = PesanSekarang::select('tanggal')->get();

    //     return response()->json([
    //         'data' => $posts,
    //         'success' => true,
    //         'message' => 'Daftar pesanan berhasil dimuat',
    //     ]);
    // }

    public function listPesanan()
    {
        $start = Carbon::now()->subMonth()->startOfMonth();
        $end   = Carbon::now()->addMonth()->endOfMonth();

        $posts = PesanSekarang::whereBetween('tanggal', [$start, $end])
            ->whereNotIn('status', ['batal'])
            ->select('tanggal')
            ->get();



        return response()->json([
            'data'    => $posts,
            'success' => true,
            'message' => 'Daftar pesanan berhasil dimuat',
        ]);
    }

    public function listDetailPesanan(Request $request)
    {
        $tanggal = anti_injeksi($request->tanggal);
        $pesan = PesanSekarang::select('nama', 'lokasi', 'kontak')
            ->leftJoin('pelanggan', 'pesan_sekarangs.id_pelanggan', '=', 'pelanggan.id')
            ->where('tanggal', $tanggal)
            ->get()
            ->map(function ($item) {
                return [
                    'nama' => substr($item->nama, 0, 3) . '***',
                    'lokasi' => substr($item->lokasi, 0, 3) . '***',
                    'kontak' => '*****' . substr($item->kontak, -4),
                ];
            });

        $data = [
            'status' => 'success',
            'data' => $pesan,
        ];

        return response()->json($data);
    }
}
