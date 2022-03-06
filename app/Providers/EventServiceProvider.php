<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;


use App\Events\SycDataApiEvent;
use App\Events\syncFacilityEvent;

use App\Listeners\SycDataApiListener;
use App\Listeners\SycDataApiFacilityListener;




class EventServiceProvider extends ServiceProvider
{
    // Registered::class => [
    //     SendEmailVerificationNotification::class,
    // ],
    // NotififyTransferEvent::class=>[
    //     SendNewTransferNotification::class,
    // ]
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        SycDataApiEvent::class => [
            SycDataApiListener::class,
        ],
        syncFacilityEvent::class => [
            SycDataApiFacilityListener::class,
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
