<?php

namespace App\Listeners;

use App\Events\AutoUpdateCREvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Patient;

class TimeTriggeredListener implements ShouldQueue
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
     * @param  \App\Events\AutoUpdateCREvent  $event
     * @return void
     */
    public function handle(AutoUpdateCREvent $event)
    {
        // dd($event->patients);

        // sleep(10);



        foreach($event->patients as $patient)
        {
            Patient::create([
                 "fname" => $patient->first_name,
                  "mname" => $patient->second_name,
                 "lname" => $patient->surname,
                 "dob" => $patient->dob,
                 "gender" => $patient->gender,
                 "date_updated" => $patient->date_updated,
                 "date_created" => $patient->date_created,
                 "county" => $patient->county,
                 "village" => $patient->village,
                 "CCC_Number" => rand(10000,90000).'-'.rand(10000,90000)
            ]);
        }

        return 'created';

        //my time trigger comes here
        // $user = Patient::find($event->userId)->toArray();
    }
}
