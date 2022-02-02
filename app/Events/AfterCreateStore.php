<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AfterCreateStore
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $nombre;
    public $apellido;
    public $email;
    public $store_id;
    public $telefono;

    /**
     * Create a new event instance.
     *
     * @return void
     * @param mixed $nombre
     * @param mixed $apellido
     * @param mixed $email
     * @param mixed $store_id
     * @param mixed $telefono
     */
    public function __construct($nombre,$apellido,$email,$store_id,$telefono)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->email=$email;
        $this->store_id=$store_id;
        $this->telefono=$telefono;

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
