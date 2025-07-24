<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanTeknisi extends Model
{
    use HasFactory;

    protected $table = 'pesan_teknisi';

    protected $fillable = [
        'id_pesan',
        'id_teknisi',
        'created_at',
        'updated_at'
    ];
}
