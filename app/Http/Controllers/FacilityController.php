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
}
