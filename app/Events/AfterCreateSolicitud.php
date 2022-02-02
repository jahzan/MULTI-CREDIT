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

class AfterCreateSolicitud
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $solicitud;
    public $pathFirma;

    /**
     * Create a new event instance.
     * @param Solicitud $solicitud solicitud de credito
     * @param mixed $pathFirma path donde esta la firma 
     * @return void
     */
    public function __construct($solicitud,$pathFirma)
    {
        $this->solicitud = $solicitud;
        $this->pathFirma = $pathFirma;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    // public function broadcastOn()
    // {
    //     return new PrivateChannel('channel-name');
    // }
}
