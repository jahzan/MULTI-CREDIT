<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignDocument extends Model
{
    use HasFactory;
    
    public $fillable =[
        'id_otp',
        'pathDocument',
        'tipoDoc',
        'firma',
        'datosFirmar',
        'solicitud_id',
    ];
}
