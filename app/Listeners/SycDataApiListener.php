<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Patient;


class SycDataApiListener implements ShouldQueue
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

        // dd($event->patients);
        // sleep(10);

        foreach($event->patients as $patient)
        {

            if (Patient::where('CCC_Number', $patient->ccc_number)->exists()) {
                // patients with the same ccc_no already exists
                continue;
                // dump('user with ccc_number'.$patient->ccc_number);

            }else{
                Patient::Create([
                    "fname" => $patient->first_name,
                    "mname" => $patient->second_name,
                    "lname" => $patient->surname,
                    "dob" => $patient->dob,
                    "gender" => $patient->gender,
                    "date_updated" => $patient->date_updated,
                    "date_created" => $patient->date_created,
                    "county" => $patient->county,
                    "village" => $patient->village,
                    "CCC_Number" => $patient->ccc_number
                    // rand(10000,90000).'-'.rand(10000,90000)
                ]);
            }
        }
    }
}
