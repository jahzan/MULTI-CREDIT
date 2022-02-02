<?php

namespace App\Http\Middleware;

use App\Models\ResetPassword;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordReset
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
        if (Auth::user()) { // se comprueba si hay un usuario conectado
            return redirect('dashboard'); // si se esta conectado se reenvia a la pagiina principal
        }
        if (!User::find($request->route()->parameters()['id'])) {//se revisa que el usuario exita en la base de datos
            abort(403);// si el usuario no exite se le envia a la pagina 403 sin autorizacion
        }

        $email = User::find($request->route()->parameters()['id'])->email;// se guarda el email del usuario.

        if (!ResetPassword::where('email', 'LIKE', $email)->first()) {// se consulta si hay  solicitud de cambio de contraseña
            abort(403);//si no hay una  solicitudes con email se envia ala paginad eeror 403
        }
        
        $hash = ResetPassword::where('email', 'LIKE', $email)->first()->token;// se trae el token encriptado de la base de datos
        $token = $request->route()->parameters()['hash'];// se guarda el token sin encriptardado por el cliente

        if (Hash::check($token, $hash)) {// se hace una verificacion del token encriptado de la base de datos con el token suministrado 
            return $next($request);// si el token coinside se envia al se continua con el proceso 
        } else {
            abort(403);// si el token no conside se envia al pagina de error 403
        }
            /**
             * El metodo  handle es el encargado de validar la solicitudes con lo parametrizado
             * Si el usuario esta athenticate retorne al dasboard
             * $email es la variable que guarda el email, que esta en la tabla en la base de datos (users).
             * El usuario se consulta utilizando el parametro de la url [id] (id user)
             * $hash es el token encriptado la cual esta en la base de datos (reset_passwords)
             * se consulta el token ecriptado a la table (reset_passwords) utilizando email como referencia.
             * $token es el token que ingresa el cliente el cual se vailida con el $hash
             * Si el $token corresponde al $hash guardado en la base de datos
             * se continua con la peticion
             * Si no
             * se envia un error 403 permisos no vaalidos. 
             */
        
    }
}
