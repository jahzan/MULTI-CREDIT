<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desembolso extends Model
{
    use HasFactory;
    public $fillable = [
        "amount",
        "solicitud_id",
        "cuotas",
    ];
}
