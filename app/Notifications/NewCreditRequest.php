<?php

namespace App\Notifications;

use App\Models\Solicitud;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCreditRequest extends Notification
{
    use Queueable;


    public Solicitud $solicitud;
    public $storeName;

    /** variables locales o Atribustos de la clase */




    public function __construct(Solicitud $solicitud)
    {
        $this->solicitud = $solicitud;
        /**
         * Constructor de la calase NewCreditRequest que extiende de Illuminate\Notifications\Notification;
         * Se crea un parametro para constructor $solicitud de tipo App\Models\Solicitud;
         * Se guarda el parametro en un variable local(atributo de la clase)
         */
    }


    public function via($notifiable)
    {
        return ['mail', 'broadcast', 'database']; 
        /**
         * via Metodo es el cual se expecifica los dirver(medios) donde se enviaran las notificaciiones
         * Mail para enviar correo electronicos
         * Boadcast para envio de notificaciones realtime 
         * Database para guardar las notificaciones en base de datos
         */
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line($this->solicitud)
                    ->line('Thank you for using our application!');
        /**
         * toMail metodo el cual se define el objeto a enviar por correo electronico
         * Se destacael objeto a enviar debe ser de tipo Illuminate\Notifications\Messages\MailMessage;
         */
    }


    public function toArray($notifiable)
    {
        return [
            'message'       => "ha solicitado un credito para",
            'sender'        => $this->solicitud->user->store->name,
            'client'        => $this->solicitud->nombre . " " .  $this->solicitud->apellido,
            'url'           => "",
         ];

        /**
         * Metodo toArray se retorna un array de datos.
         * el array contendra los datos a guardar en la base dedatos en la tabla de notify
         * el array contendra la variable local $this->solicitud el cual es de tipo App\Models\Solicitud
         */
    }


}
