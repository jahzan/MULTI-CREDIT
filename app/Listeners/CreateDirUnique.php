<?php

namespace App\Listeners;

use App\Events\CreateDirUnique as CreateDirUniqueEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CreateDirUnique
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
     * @param  CreateDirUnique  $event
     * @return void
     */
    public function handle(CreateDirUniqueEvent $event)
    {
        $existeCarpeta = true;
        while ($existeCarpeta) {
            $idDir =  Str::random(40);
            if(!Storage::exists($event->path.$idDir)) {
                Storage::makeDirectory($event->path.$idDir, 0775, true); //creates directory
                $existeCarpeta = false;
                return $event->path.$idDir;
                
            }
        }
    }
}
