<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Facility;

use GuzzleHttp;

use App\Helpers\Http;

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

        $data = Http::post('http://api.kmhfltest.health.go.ke/o/token/', [
            "grant_type" => "password",
            "username" => "test@testmail.com",
            "password" => "Test@1234",
            "scope" => "read",
            "client_id" => "fuEOuyx3A0S3mGorbFKnuJbVliKhmsN7fbDMVQ7r",
            "client_secret" => "NLOXxi7VYtrbu4RUWk0j77G9brxPPU7U4zZosnL3xhtIG1dd7usHZCWHabP9x2A6eWscU88RxcXnfHWmYFAPqhNdHl4BWe2AfaVno5r7RYXYpgQHcLu4dsQrr5TBST6w"
        ]);
        $token = json_decode($data->getBody()->getContents());
        // dd($token->access_token);
        // $headers = [
        //     'Authorization' => 'Bearer ' . $token->access_token
        // ];

        $client = new GuzzleHttp\Client();
        $data = $client->get('http://api.kmhfltest.health.go.ke/api/facilities/facilities/?format=json', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token->access_token
            ]
        ]);

        $facilities = json_decode($data->getBody()->getContents());

        // dd($event->facilities);

        // $facilities = $patients->total_pages;
        // $pages = $facilities->next;

        // dd($pages);

        $client = new GuzzleHttp\Client();
        $page_no = 0;
        $page_url = "";

        // dump($facilities);
        // $facilities_pages->total_pages
        // $facilities->next != null
        while($facilities->next != null)
        {

            $page_url = $facilities->next;

            // dump($page_url);

            $data = $client->get($page_url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token->access_token
                ]
            ]);

            $facilities = json_decode($data->getBody()->getContents());
            $facility_results = $facilities->results;

            // dump($facility_results);



            foreach($facility_results as $fc_res)
            {

                // if($fc_res->code == null){
                //     continue;
                // }
                Facility::firstOrCreate([
                    "name" => $fc_res->official_name,
                    "mfl_code" => $fc_res->code,
                    "county" => $fc_res->county,
                    "sub_county" => $fc_res->sub_county_name,
                    "ward" => $fc_res->ward,
                    "facility_type" => $fc_res->facility_type
                ]);

                // dump($fc_res->code . "=>" . $fc_res->official_name . "=>" . $fc_res->county  . "=>" . $fc_res->sub_county_name   . "=>" . $fc_res->ward . "=>" . $fc_res->facility_type );


            }


            $page_no++;
        }

        // foreach($event->facilities as $facility)
        // {
        //     // // dump($facility);
        //     // sleep(100);
        //     if(Facility::where('mfl_code', $facility->mfl_code)->exists()){
        //         continue;
        //     }else{
        //         Facility::create([
        //             "name" => $facility->name,
        //             "mfl_code" => $facility->mfl_code,
        //             "county" => $facility->county,
        //             "sub_county" => $facility->sub_county,
        //             "ward" => $facility->ward,
        //             "facility_type" => $facility->facility_type
        //         ]);
        //     }

        // }
    }
}
