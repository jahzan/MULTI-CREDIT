<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudioCreditoAnexo extends Model
{
    use HasFactory;
    protected $fillable = [
        'estudio_credito_id', 
        'anexo' 
    ];
}
