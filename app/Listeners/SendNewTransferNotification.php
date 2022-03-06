<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Notification;

use App\Notifications\NewTransferNotification;


class SendNewTransferNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // $admins = User::whereHas('is_admin', function ($query) {
        //     $query->where('id', 1);
        // })->get();
        $admins = User::where("is_admin",1)->get();
        Notification::send($admins, new NewTransferNotification($event->transfer));

            // $patient = Patient::where('id', 1)->get();
            // Notification::send()


        // Notification::send($admins, new NewUserNotification($event->user));
    }
}
