<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'pruebas',//pruebas se tiene que quitar despues de las pruebas
        'estado-cuenta/create-validate'//pruebas se tiene que quitar despues de las pruebas
    ];
}
