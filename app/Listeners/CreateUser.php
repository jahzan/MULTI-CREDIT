<?php

namespace App\Listeners;

use App\Events\AfterCreateStore;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUser implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AfterCreateStore  $event
     * @return void
     */
    public function handle(AfterCreateStore $event)
    {
        $user = User::create([
            'name' => $event->nombre,
            'lastname' => $event->apellido,
            'email' => $event->email,
            'password' => Hash::make(Str::random(40)),
            'store_id' => $$event->store_id,
            'socio_de_negocio_id' => null,
            'telefono' => $event->telefono,
         ]);
         $user->assignRole('store.admin');
    }
}
