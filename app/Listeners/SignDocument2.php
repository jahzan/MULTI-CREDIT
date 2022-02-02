<?php

namespace App\Listeners;

use App\Events\CreateVerifyOtp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SignDocument2
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
     * @param  CreateVerifyOtp  $event
     * @return void
     */
    public function handle(CreateVerifyOtp $event)
    {
        //
    }
}
