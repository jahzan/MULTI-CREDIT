<?php

namespace App\Listeners;

use App\Events\AfterCreateSolicitud;
use App\Mail\SendDocuments as MailSendDocuments;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;


class SendDocuments
{
    use Queueable, SerializesModels;
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
     * @param  AfterCreateSolicitud  $event
     * @return void
     */
    public function handle(AfterCreateSolicitud $event)
    {
        Mail::to($event->solicitud->email)->queue(new MailSendDocuments($event->solicitud,$event->pathFirma));//envia el correo de registro de solicitud
    }
}
