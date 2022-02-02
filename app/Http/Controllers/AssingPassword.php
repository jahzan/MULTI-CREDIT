<?php

namespace App\Http\Controllers;

use App\Mail\ChangesPassword;
use App\Models\PasswordReset;
use App\Models\ResetPassword;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Illuminate\Support\Str;

class AssingPassword extends Controller
{
    /**
     * 
     * 
     * METODO GET PARA MOSTRAR LA VISTA DE CAMBIO
     * DE LA CONTRASEÑA
     */


    public function forgotPassword(){

        return Inertia::render('Auth/ForgotPassword');
        /**
         * Metodo forgotPassword es el metodo que mostrara el formulario para cambio de contraseña
         * 
         */
    }

    /**
     * 
     * 
     * METODO POST PARA PROCESAR LOS DATOS DE CAMBIO
     * DE LA CONTRASEÑA
     */


    public function forgotPasswordPost(Request $request){

        $user = User::where('email','like',$request->email)->first();

        if(!$user){
            return Inertia::render('Auth/ForgotPassword',[
                'status' => __('passwords.user'),
            ]);
        }

        $token = Str::random(60);
        ResetPassword::where('email','LIKE',$user->email)->delete();
        ResetPassword::create([
            'email' => $user->email,
            'token' => Hash::make($token),
            'type'  => 'Reset-password'
        ]);
        Mail::to($user->email
        )->send(new ChangesPassword($user,$token));

        return Inertia::render('Auth/ForgotPassword',[
            'status' =>  __('passwords.sent')
        ]);
        
        /**
         * Metodo forgotPasswordPost. Guarda los datos del formulario cambio de contraseña
         * Resive como parametro un objeto de tipo Request el cual contedra: email
         * $user se guarda el usuario que tenga asignado ese correo.
         * $token se guarda una cadena aleatoria de 60 caracteres.
         * Se elimina datos de cambio de contraseña anteriores con el mismo email ResetPassword->delete().
         * se guarda un nuevo registro con el email registrado al usuario($user->email), el token encriptado(Hash::make($token))
         * y el tipo de solicitud ('Reset-password')
         * se envia al correo el token  Mail::to($user)->send(new ChangesPassword($user,$token));
         */

    }


    /**
     * 
     * 
     * METODO GET PARA MOSTRAR LA VISTA DE ASIGNACION
     * DE LA CONTRASEÑA
     */
    public function verify($id){
        $user = User::find($id);
        return Inertia::render('Auth/ResetPassword',[
            'email' => $user->email,
            ]);
        
        /**
         * Metodo verify es el metodo que muestra y se verifica atraves de middleware el token enviado
         * el link enviado contiene un token y el id del user
         * se consulta en la tabla users el email
         * una ves verifaco el token enviado se muestra el formulario para asignar una nueva contraseña
         * el formulario recibe como parametro el email
         * 
         */
    }


    
    /**
     * 
     * 
     * METODO POS PARA ASIGNAR LA CONTRASEÑA
     * 
     * 
     */

    public function changePassword(Request $request){
        $request->validate([
                'email' => 'required|max:255',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6'
                ]);
        $data = $request->all();
        if(ResetPassword::where('email','LIKE',$data['email'])->first()->type == "assign-password"){
            User::where('email','LIKE',$data['email'])->update([
                'password' => Hash::make($data['password']),
                'email_verified_at' => new DateTime('now')
            ]);
            ResetPassword::where('email','LIKE',$data['email'])->delete();
        }
        else{
            User::where('email','LIKE',$data['email'])->update(['password' => Hash::make($data['password'])]);
            ResetPassword::where('email','LIKE',$data['email'])->delete();
        }
        return redirect('login');

        /**
         * Metodo changePassword es utilizado para cambiar la contraseña 
         * resive como parametro el objeto Request el cual contiene los datos del form
         * el $request se valida que los datos email no sean nulos
         *  y que la contraseña es confirmada y no sea menos de 6 caracteres
         * seguarda los datos en un array $data 
         * Se busca el usuario y se actualiza la contraseña
         * se elimina el token de verificacion pra que no pueda ser utilizado otra vez
         * se redirecciona a la vista de login
         */
    }
}
