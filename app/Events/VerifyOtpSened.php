<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VerifyOtpSened
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $otpId = "";
    public $otpToken = "";


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($otpId, $otpToken)
    {
        $this->$otpId = $otpId;
        $this->$otpToken = $otpToken;
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
