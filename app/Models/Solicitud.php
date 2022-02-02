<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Activitylog\Traits\LogsActivity;

class Solicitud extends Model
{
    use HasFactory;
    use LogsActivity;


    protected static $logName = 'Solicitud';
    protected $fillable = [
        'nombre',
        'apellido',
        'numeroDeDocumento',
        'fechaExpedicion',
        'fechaNacimiento',
        'telefono',
        'email',
        'monto',
        'user_id',
        'otp_id',
        'solicitud_estado_id',
        'path_solicitud'
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
