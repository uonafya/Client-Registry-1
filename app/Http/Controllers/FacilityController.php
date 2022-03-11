<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Patient;

use Illuminate\Support\Facades\Route;
use  App\Events\PullUpdatesEvent;

use App\Helpers\Http;
use Illuminate\Support\Carbon;

use GuzzleHttp;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $patient = Patient::all();
       return view('Facility.index', compact('patient'));

    }

    public function getFacility()
    {
        $data = Http::get('http://localhost:3000/facility');
        $facility = json_decode($data->getBody()->getContents());




        foreach($facility as $facility)
        {
            // dump($facility);
            // sleep(100);

            facility::create([
                    "name" => $facility->name,
                    "mfl_code" => $facility->mfl_code,
                    "county" => $facility->county,
                    "sub_county" => $facility->sub_county,
                    "ward" => $facility->ward,
                    "facility_type" => $facility->facility_type
            ]);
        }


        // $table->string('facility_name');
        // $table->string('MFL_CODE')->unique();

    }

    public function getPatient()
    {
        // event(new PullUpdatesEvent($user));
        $data = Http::get('http://localhost:3000/patients');
        $patients = json_decode($data->getBody()->getContents());
        // dd($patients);

        foreach($patients as $patient)
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

        return $patient;
    }

    public function addPatient(Request $req)
    {
        $data = Http::post('http://localhost:3000/patients', [
            "first_name" => "Kichaka I created",
            "second_name" => "Fundamentals",
            "surname" => "Diesel",
            "dob" => "1962-04-16T00 :00:00",
            "gender" => "M",
            "date_updated" => "2016-08-24T10 :00:35",
            "date_created" => "2014-04-16T14 :19:25",
            "county" => 'kirinyaga',
            "village" => 'mutoma',
            "ccc_number" => rand(10000,90000).'-'.rand(10000,90000)
        ]);
        $post = json_decode($data->getBody()->getContents());
        dd($post);
    }

    public function pullUpdates()
    {


        //check the last date in local
        $data = Http::get('http://localhost:3000/patients');
        $patients = json_decode($data->getBody()->getContents());
        // dump($patients);

        $pt = Patient::orderBy('id','DESC')->first();
        $local_instance__date = $pt->date_created;

        $date2 = Carbon::createFromFormat('m/d/Y H:i:s', '12/01/2020 10:20:00');

        // foreach($patients as $patient)
        // {
            // dump($patient->date_created);
            $date1 = Carbon::createFromFormat('m/d/Y H:i:s', '12/01/2020 10:20:00');

            $result = $date1->eq($date2);
            if($result){
            //    event(new )
            }
            // $this->getPatient();

        // }

        //compare with last date in remote

        //pull all data with a date greater than local date

    }

    public function getToken(Request $req)
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
        // $facilities = $patients->total_pages;
        // $pages = $facilities->next;

        // dd($pages);

        $page_no = 0;
        $page_url = "";

        // dump($facilities);
        // $facilities_pages->total_pages
        // $facilities->next != null
        while($facilities->next != null)
        {

            $page_url = $facilities->next;
            // dump($paged_url);
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
                // dump($fc_res->code);
                // official_name

                // $result=array($fc_res->code => $fc_res->official_name);

                // foreach($result as $x=>$x_value)
                // {
                // dump($x . "=>" . $x_value);
                // // echo "<br>";
                // }

                // 16115=>Eshinutsa Health Centre=>Kakamega=>Khwisero=>af0ab18c-81ca-425b-9b1a-3317bc80142d=>479a9a16-219f-48f6-818d-b2c06ada2332"

                if($fc_res->code == null){
                    continue;
                }
                Facility::firstOrCreate([
                    "name" => $fc_res->official_name,
                    "mfl_code" => $fc_res->code,
                    "county" => $fc_res->county,
                    "sub_county" => $fc_res->sub_county_name,
                    "ward" => $fc_res->ward,
                    "facility_type" => $fc_res->facility_type
                ]);

                dump($fc_res->code . "=>" . $fc_res->official_name . "=>" . $fc_res->county  . "=>" . $fc_res->sub_county_name   . "=>" . $fc_res->ward . "=>" . $fc_res->facility_type );


            }


            $page_no++;


        }



        // foreach($facilities as $fc)
        // {
        //     $arrayVariable = array(
        //         $fc->official_name => $fc->code
        //     );
        //     // dump($fc->official_name.);
        //     // $array = array($fc->official_name => $fc->code);
        //     dump($arrayVariable);

        // }

    }


}
