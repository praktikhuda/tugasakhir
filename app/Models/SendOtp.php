<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendOtp extends Model
{
    use HasFactory;

    protected $table = 'send_otp';

    protected $fillable = [
        'email',
        'kode',
        'created_at',
        'updated_at'
    ];
}
