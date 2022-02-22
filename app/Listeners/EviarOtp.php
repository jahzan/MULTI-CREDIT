<?php

namespace App\Listeners;

use App\Events\CreateVerifyOtp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use MessageBird\Objects\Verify;
use MessageBird\Client;

class EviarOtp
{
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
     * @param  \App\Events\CreateVerifyOtp  $event
     * @return void
     */
    public function handle(CreateVerifyOtp $event)
    {
        // proecesos de crear el verify el cual es el encargado de enviar el otp
         $verify = new Verify(); // crea objeto de tipo verify
         $verify->originator = 'Multicredit';// se establece el que origina el mensaje de datos
         $verify->recipient = '57'."".$event->telefono;// se estabelece la ubicacion del telefono 57 para celular colombiano
         $verify->template = $event->template;//se establece el mensaje aa ser enviado
         $client = new Client(config('messagebird.key'));// se crea una intancia del cliente el cual es comunica con messagebird y se le pasa la verificacion de identidad que son key entregadas.
         $verify->type = "sms";// se le establece el medio por el cual se va enviar los datos se establece sms
         $result=$client->verify->create($verify,['timeout' => 600,]);//al cliente se le envia el objeto ya parametrisado de verify el cual es el utilizado para hacer la verificacion otp
         $otpId = $result->getId();//se obtiene el id del objeto creado
         return $otpId;
    }
}
