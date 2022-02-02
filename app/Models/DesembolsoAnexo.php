<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesembolsoAnexo extends Model
{
    use HasFactory;
    public $fillable = [
        "desembolso_id",
        "anexo"
    ];
}
