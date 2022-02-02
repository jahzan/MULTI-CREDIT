<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Pruebas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $cumple = true;
        if($cumple){
            return $next($request);
        }
        else{
            abort(403);
        }
        
    }
}
