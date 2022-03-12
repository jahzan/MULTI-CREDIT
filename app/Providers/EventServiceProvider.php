<?php

namespace App\Providers;

use App\Events\BeforeCreateSolicitud;
use App\Events\CreateVerifyOtp;
use App\Events\VerifyOtpSened;
use App\Events\BeforeCreateDesembolso;
use App\Events\AfterCreateSolicitud;
use App\Events\AfterCreateSoeconomico;
use App\Events\AfterCreateStore;
use App\Events\CreateDirUnique as CreateDirUniqueEvent;
use App\Listeners\SignDocument;
use App\Listeners\EviarOtp;
use App\Listeners\VerificarOtp;
use App\Listeners\CreateUser;
use App\Listeners\SocioeconomicoPdf;
use App\Listeners\CreateDirUnique as CreateDirUniqueListener;
use App\Listeners\SendDocuments;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        BeforeCreateSolicitud::class =>[
            SignDocument::class
        ],
        AfterCreateSolicitud::class =>[
            SendDocuments::class
        ],
        AfterCreateSoeconomico::class =>[
            SocioeconomicoPdf::class
        ],
        AfterCreateStore::class =>[
            CreateUser::class
        ],
        CreateDirUniqueEvent::class =>[
            CreateDirUniqueListener::class,
        ],
        BeforeCreateDesembolso::class =>[
            SignDocument::class,
        ],
        CreateVerifyOtp::class =>[
            EviarOtp::class,
        ],
        VerifyOtpSened::class => [
            VerificarOtp::class,
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
