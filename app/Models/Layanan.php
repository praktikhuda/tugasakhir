<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    
    protected $table = 'layanan';

    protected $fillable = [
        'id_jenis',
        'keterangan',
        'tarif',
        'created_at',
        'updated_at'
    ];
}
