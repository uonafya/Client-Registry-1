<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Facility;

class SycDataApiFacilityListener implements ShouldQueue
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

        // dd($event->facilities);

        foreach($event->facilities as $facility)
        {
            // // dump($facility);
            // sleep(100);
            if(Facility::where('mfl_code', $facility->mfl_code)->exists()){
                continue;
            }else{
                Facility::create([
                    "name" => $facility->name,
                    "mfl_code" => $facility->mfl_code,
                    "county" => $facility->county,
                    "sub_county" => $facility->sub_county,
                    "ward" => $facility->ward,
                    "facility_type" => $facility->facility_type
                ]);
            }

        }
    }
}
