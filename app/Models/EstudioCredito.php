<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;

class EstudioCredito extends Model
{

    use HasFactory;
    use LogsActivity;

    //Parametros//
    protected static $logName = 'estudio_credito';

    // Fillables //
    protected $fillable = [
        'solicitud_estado_id',
        'solicitud_id',
        'valor',
        'descripcion',
        'anexo'
    ];
    protected static $logAttributes =['*'];
}
