<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;


class SocioEconimico extends Model
{
    use HasFactory;
    use LogsActivity;

    protected static $logName = 'SocioEconimico';
    public $fillable = [
        'estadoCivil',
        'personasAcargo',
        'sexo',
        'tipoVivienda',
        'ciudad',
        'direccion',
        'nivelAcademico',
        'estadoLaboral',
        'estadoPensional',
        'empresaLabora',
        'telefonoEmpresa',
        'direccionEmpresa',
        'ingresosFijos',
        'otrosIngresos',
        'gastos',
        'solicitud_id'
    ];
    protected static $logAttributes =['*'];




    /**
     * Obtine el  User que esta realizando la solcitud
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }





    /**
     * Obtiene la Zone del alamacen que esta realizando la solicitud.
     */
    public function zone(): BelongsTo
    {
        return $this->store->belongsTo(Zone::class);
    }
    


    /**
     * Obtiene la Zone del alamacen que esta realizando la solicitud.
     */
    public function creditUser(): BelongsTo
    {
        return $this->store->belongsTo(User::class);
    }


} 
