<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanSekarang extends Model
{
    use HasFactory;

    protected $table = 'pesan_sekarangs';

    protected $fillable = [
        'id_layanan',
        'id_pelanggan',
        'lokasi',
        'tanggal',
        'kontak',
        'catatan',
        'status',
        'kode',
        'alasan',
        'id_teknisi',
        'created_at',
        'updated_at'
    ];
}
