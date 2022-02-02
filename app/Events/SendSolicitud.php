<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendSolicitud
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $name,$lastname,$email,$phone,$fecexp,$document;
    public function __construct($name,$lastname,$email,$phone,$fecexp,$document)
    {
        $this->name= $name;
        $this->lastname= $lastname;
        $this->email= $email;
        $this->phone= $phone;
        $this->fecexp= $fecexp;
        $this->document= $document;
    }
}
