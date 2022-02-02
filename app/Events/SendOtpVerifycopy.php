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

class SendOtpVerify
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    
    public $telefono;
    public $template;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($telefono, $template)
    {
        $this->telefono = $telefono;
        $this->template = $template;
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
