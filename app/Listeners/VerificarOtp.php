<?php

namespace App\Listeners;

use App\Events\VerifyOtpSened;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use MessageBird\Objects\Verify;
use MessageBird\Client;

class VerificarOtp
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
     * @param  \App\Events\VerifyOtpSened  $event
     * @return void
     */
    public function handle(VerifyOtpSened $event)
    {
        $client = new Client(config('messagebird.key'));
        $result = $client->verify->verify($event->otpId, $event->otpToken);
        return $result->getStatus() === Verify::STATUS_VERIFIED;
    }
}
