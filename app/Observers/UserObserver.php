<?php

namespace App\Observers;

use App\Mail\NewUser;
use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Evento al crear un modelo User
     * 
     * @ este evento se crea para cuando se guarde un usuario se procedaa a enviar un correo de bienvenida
     *  el cual se le enviara un enlace para activar el usuario y asignar contraseña. 
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //funcion que se ejecuta cuando se halla creado un usuario
        
        $token = Str::random(60);//token de seguridad creado aleatoriamnete para auth para asingnar password
        ResetPassword::create([ 
            'email' => $user->email,//email del usuario asignar contraseña
            'token' => Hash::make($token),// encipta el token patra que solo el usuaro lo tenga y lo pueda validar
            'type'  => 'assign-password'//tipo de cambio de contraseña se le especifica que es nuevo
        ]);// se guarda en la base de datos la solicitud cambio de contraseña
        Mail::to($user)->queue(new NewUser($user,$token));//envia el correo de bienvenida
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
