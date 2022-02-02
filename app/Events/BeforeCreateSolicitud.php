<?php

namespace App\Events;

use App\Models\Solicitud;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class BeforeCreateSolicitud
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public Solicitud $solicitud;
    public $datosFirmar;
    public $tipoDoc;
    public $idOtp;
    /**
     * Create a new event instance.
     *
     * @return void
     * @param Solicitud $solicictud
     * @param mixed $datosFirmar
     * @param mixed $tipoDoc
     * @param mixed $idOtp
     */
    public function __construct(Solicitud $solicitud,$datosFirmar,$tipoDoc,$idOtp)
    {
        $this->solicitud=$solicitud;//
        $this->datosFirma=$datosFirmar;//
        $this->tipoDoc=$tipoDoc;//
        $this->idOtp = $idOtp;
    }

    // /**
    //  * Get the channels the event should broadcast on.
    //  *
    //  * @return \Illuminate\Broadcasting\Channel|array
    //  */
    // public function broadcastOn()
    // {
    //     return new PrivateChannel('channel-name');
    // }
}
