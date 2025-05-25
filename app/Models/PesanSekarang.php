<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanSekarang extends Model
{
    use HasFactory;

    protected $table = 'pesan_sekarangs';

    protected $fillable = [
        'namalengkap',
        'email',
        'nomer',
        'alamat',
        'tanggal',
        'layanan',
        'catatan',
        'kode',
        'status',
        'alasan'
    ];
}
