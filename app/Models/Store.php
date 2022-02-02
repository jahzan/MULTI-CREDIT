<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Store extends Model
{
    /**
     * 
     * Traits
     */
    use HasFactory; 
    use SoftDeletes;
    use LogsActivity;


    /**
     * Parametros
     */
    protected static $logName = 'Store';


    /**
     * Fillables
     */
    protected $fillable = [
        'name',    'nit',    'email',    'telefono',    'representante', 'socio_de_negocio_id', 'zone_id'
    ];
    protected static $logAttributes = ['*'];



    /**
     * devuelve zona que esta registrado a este almacen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

    
    /**
     * devuelve las solicitudes realizadas por el almacen.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */

    public function solicitudes(): HasManyThrough
    {
        return $this->hasManyThrough(Solicitud::class, User::class);
    }


}
