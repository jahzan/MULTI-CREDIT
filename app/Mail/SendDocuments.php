<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Queue\SerializesModels;

class SendDocuments extends Mailable
{
    use Queueable, SerializesModels;
    public $solicitud;
    public $pathFirma;

    /**
     * Create a new message instance.
     * @param $pdf pdf de autorizacion
     * @return void
     */
    public function __construct($solicitud,$pathFirma)
    {
        $this->solicitud    =   $solicitud;//
        $this->pathFirma    =   $pathFirma;//
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = PDF::loadView('Doc.solicitud',$this->solicitud);
        $pdf ->save(storage_path('app/public/'.$this->solicitud->path_solicitud) . '/solicitud.pdf');
        return $this->view('Mail.NewSolicitud')
        ->attachData($pdf->output(),'Autorizacion.pdf')
        ->attachFromStorage($this->pathFirma ."/firma.dat",'firma.dat');
    }
}
