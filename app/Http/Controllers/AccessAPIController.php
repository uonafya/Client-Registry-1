<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Events\syncFacilityEvent;

use App\Models\Patient;
use App\Helpers\Http;
use App\Http\Controllers\Controller;
use App\Models\Facility;

class AccessAPIController extends Controller
{
    use HasFactory;

    public function getToken(Request $reqs)
    {
        //Event Listnser send email;


        // foreach($facility as $facility)
        // {
        //     // // dump($facility);
        //     // sleep(100);
        //     // if(Facility::where('mfl_code', $facility->mfl_code)->exists() && $facility->mfl_code == null ){
        //     //     continue;
        //     // }else{

        //     // }

        //     Facility::create([
        //         "name" => $facility->name,
        //         "mfl_code" => $facility->mfl_code,
        //         "county" => $facility->county,
        //         "sub_county" => $facility->sub_county,
        //         "ward" => $facility->ward,
        //         "facility_type" => $facility->facility_type
        //     ]);
        // }

        // dump("facility import complete");

    }

    public function getPatientWithCCC(Patient $patient, Request $req)
    {
        $patient = Patient::where('CCC_Number',$req->name)->get();

        return $patient;

    }
    public function getFacilityByMfl(Request $req)
    {
        $facility = Facility::where('mfl_code', $req->mflcode)->get();

        return $facility;
    }



}
