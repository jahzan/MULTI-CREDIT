<?php

namespace App\Observers;

use App\Models\Solicitud;
use App\Models\User;
use App\Notifications\NewCreditRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class SolicitudObserver
{
    /**
     * Handle the Solicitud "created" event.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return void
     */
    public function created(Solicitud $solicitud)
    {
        // 
    }

    /**
     * Handle the Solicitud "updated" event.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return void
     */
    public function updated(Solicitud $solicitud)
    {
        Log::info("ingresa a al update \n" . $solicitud );
        switch ($solicitud->solicitud_estado_id) {
            case 1:
                Notification::send(User::find($solicitud->user->store->zone->user_id), new NewCreditRequest($solicitud));
                break;
            case 3:
                Notification::send(User::find($solicitud->user), new NewCreditRequest($solicitud));
                break;
            case 4:
                Notification::send(User::find($solicitud->user), new NewCreditRequest($solicitud));
                break;
            case 5:
                Notification::send(User::find($solicitud->user), new NewCreditRequest($solicitud));
                break;
        }
    }

    /**
     * Handle the Solicitud "deleted" event.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return void
     */
    public function deleted(Solicitud $solicitud)
    {
        //
    }

    /**
     * Handle the Solicitud "restored" event.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return void
     */
    public function restored(Solicitud $solicitud)
    {
        //
    }

    /**
     * Handle the Solicitud "force deleted" event.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return void
     */
    public function forceDeleted(Solicitud $solicitud)
    {
        //
    }
}
