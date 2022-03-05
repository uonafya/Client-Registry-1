<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Event;
use App\Helpers\Http;
use App\Events\AutoUpdateCREvent;

class PatientController extends Controller
{
    /**S
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function updateEvent()
    {
        $data = Http::get('http://localhost:3000/patients');
        $patients = json_decode($data->getBody()->getContents());

        event(new AutoUpdateCREvent($patients));
    }

    public function search()
    {
        return view('search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Patient::create($request->only([
            'fname',
            'mname',
            "lname",
            'dob',
            'gender',
            'phone',
            'id_no',
            'CCC_Number',
            'facility_id',
            'Nemis',
            'Resident',
         ]));

         return 'created';

    }

    public function new_client(Patient $patient)
    {
        $data = Http::get('http://localhost:3000/facility');
        $facilities = json_decode($data->getBody()->getContents());

        $patient = $this->optionCounty();
        //$this->getFacility();

        return view('layouts.new_client', compact('patient', 'facilities'));

    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Patient $patient, Request $req)
    {
        // name="linked_facility"
        // name="mfl_code"
        // serial_no
        // name="dot"
        // name="residence"
        // name='county'


        $data = request()->validate([
            "fname" => "required",
            "mname" => "required",
            "lname" => "required",
            "dob" =>"required",
            "gender" => 'required',
            "Phone" => "required",
            "id_no" => "required",
            "CCC_Number" => "required",
            "Nemis" => '',
            "Resident" => 'required',
        ]);

        $patient->where('id',$req->id)->update($data);

        // $patient->update($data);
    }

    public function merge(Request $reqs)
    {
      $patient = Patient::find($reqs->id);
      $patient_exists = Patient::where('ID_Number', $reqs->id_no);

      if($patient_exists->exists())
      {
        dd($patient[0]);
      }

    }

    public function optionCounty()
    {
        return [
        1 =>'Nakuru',
         2 => 'uasingishu',
         3 => 'Nairobi',
         4 => 'Migori'
        ];
    }

    public function optionFacility()
    {
        return [
            '12345' => 'migori_hospital' ,
            '22341' => 'muranga_hospital' ,
            '32342' => 'nairobi_hospital' ,
            '62343' => 'kissii_hospital' ,
        ];
    }

    //allcustomers
    public function allclients()
    {
        $users = DB::table('patients')
            // ->where('void',1)
            ->paginate(10);


        return view('layouts.viewclient', ['users' => $users]);
    }

    public function showclient($id)
    {
        $data = Http::get('http://localhost:3000/facility');
        $facilities = json_decode($data->getBody()->getContents());
        $patient = $this->optionCounty();


        $users = DB::table('patients')->where('patients.id',[$id])
            ->join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
            ->get();


//
//        $users = DB::select('select * from patients where id = ?', [$id]);

        return view('layouts.transferin', ['users' => $users],compact('facilities','patient'));
    }

    public function editc(Request $request,$id) {
        $fname = $request->input('fname');
        $mname = $request->input('mname');
        $lname = $request->input('lname');
        $nemis = $request->input('nemis');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $id_no= $request->input('id_no');
        $facility_id= $request->input('facility_id');
        $cccno= $request->input('cccno');
        $residence= $request->input('residence');
        $county= $request->input('county');
        $enddate= $request->input('enddate');
        $transferin = 1;
        $transferred_by=Auth::user()->name;
        /*$data=array('first_name'=>$first_name,"last_name"=>$last_name,"city_name"=>$city_name,"email"=>$email);*/
        /*DB::table('student')->update($data);*/
        /* DB::table('student')->whereIn('id', $id)->update($request->all());*/
        DB::update('update patients set enddate=? where id = ?',[$enddate,$id]);


      $pcreate = Patient::create([


            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'lname' => $request->input('lname'),
            'Nemis' => $request->input('Nemis'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'id_no'=> $request->input('id_no'),
            'facility_id'=> $request->input('facility_id'),
            'CCC_Number'=> $request->input('CCC_Number'),
            'Resident'=> $request->input('Resident'),
            'county'=> $request->input('county'),
            'transferin' => 1,
            'transferred_by'=> Auth::user()->name,
             'created_by'=>Auth::user()->name,
          'updated_by'=>Auth::user()->name,

        ]);
        return view('layouts.viewclient');
    }

    public function getPatientWithCCC(Patient $patient, Request $req)
    {
                // dump($req->ccc_no);
        $search_obj = $patient->where('CCC_Number', $req->ccc_no)->get();
        // dump($search_obj);
        return $search_obj;


    }

    public function getAllPatientsInFacility(Patient $facility, Request $req)
    {
        // dd($req->mfl_code);

        $search_obj = $facility->where('facility_id', $req->mfl_code)->get();
        return$search_obj;

    }

    public function searcPatientWithCCC(Request $reqs)
    {
        $patient = $reqs->all();
        response()->json([$patient]);
    }



}
