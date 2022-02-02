<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpValidation extends Model
{
    use HasFactory;
    protected $fillable = [
        'socio_de_negocio_id',
        'otp',
        'channel',
        'validated_at',
    ];
}
