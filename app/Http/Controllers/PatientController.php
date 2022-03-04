<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Helpers\Http;

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
    public function search()
    {
        return view('search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient, Request $request)
    {


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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
<<<<<<< Updated upstream
    // public function getFacility()
    // {

    //     //dd($facilities);
    //     // foreach ($facilities as $facility)
    //     // {
    //     //     $facility_name =  $facility->name;
    //     //     $mfl_code = $facility->mfl_code;
    //     //     //dd($mfl_code, $facility_name);
    //     //     return $facility_name;
    //     // }


    //     //dd($name);


    //     return view('layouts.new_client', compact('facilities'));

    // }

=======
    
>>>>>>> Stashed changes
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
        $facility = $this->optionFacility();

        $users = DB::select('select * from patients where id = ?', [$id]);
        return view('layouts.transferin', ['users' => $users],compact('facilities','patient'));
    }
    public function editc(Request $request,$id) {
        $patient = $this->optionCounty();
        $facility = $this->optionFacility();

        $fname = $request->input('fname');
        $mname = $request->input('mname');
        $lname = $request->input('lname');
        $nemis = $request->input('nemis');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $id_no= $request->input('id_no');
        $facility= $request->input('facility');
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
//            'fname',
//            'mname',
//            'lname',
//            'nemis',
//            'dob',
//            'gender',s
//            'phone',
//            'id_no',
//            'cccno',
//            'residence',
//            'county',
//            'facility',

            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'lname' => $request->input('lname'),
            'nemis' => $request->input('nemis'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'id_no'=> $request->input('id_no'),
            'facility'=> $request->input('facility'),
            'CCC_Number'=> $request->input('CCC_Number'),
            'Resident'=> $request->input('Resident'),
            'county'=> $request->input('county'),
            'transferin' => 1,
            'transferred_by'=> Auth::user()->name,
             'created_by'=>Auth::user()->name,

        ]);
        return view('layouts.viewclient');
    }
}
