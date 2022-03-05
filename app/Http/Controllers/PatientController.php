<?php

namespace App\Http\Controllers;

use App\Models\Facility;
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
    public function edit(Request $request, $id)
    {
        $patient = $this->optionCounty();
        $facility = $this->optionFacility();

        $fname = $request->input('fname');
        $mname = $request->input('mname');
        $lname = $request->input('lname');
        $nemis = $request->input('nemis');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $id_no = $request->input('id_no');
        $facility_id = $request->input('facility');
        $cccno = $request->input('CCC_Number');
        $residence = $request->input('Resident');
        $county = $request->input('county');

       DB::table('patients')
        ->where('id', $id)
        ->update(['fname'=>$fname,'mname'=>$mname, 'lname'=>$lname, 'dob'=>$dob,
        'gender'=>$gender, 'Nemis'=>$nemis,
        'phone'=>$phone, 'id_no'=>$id_no,'facility_id'=>$facility_id, 'CCC_Number'=>$cccno,
        'Resident'=>$residence]);
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
            1 => 'Nakuru',
            2 => 'uasingishu',
            3 => 'Nairobi',
            4 => 'Migori'
        ];
    }

    public function optionFacility()
    {
        return [
            '12345' => 'migori_hospital',
            '22341' => 'muranga_hospital',
            '32342' => 'nairobi_hospital',
            '62343' => 'kissii_hospital',
        ];
    }

    //update client_details
    public function updateclient($id)
    {
        $data = Http::get('http://localhost:3000/facility');
        $facilities = json_decode($data->getBody()->getContents());
        $patient = $this->optionCounty();

        $users = Patient::join('facilities', 'patients.facility_id', '=' , 'facilities.mfl_code')
                            ->get(['patients.*','facilities.name'])
                            ->where('id',$id);



        return view('layouts.edit_client', compact('patient', 'users', 'facilities'));
    }

    //indidual
    public function clientapprej(Request $request, $id)
    {
        $users = Patient::join('facilities', 'patients.facility_id', '=' , 'facilities.mfl_code')
        ->get(['patients.*','facilities.name'])
        ->where('id',$id);


//        $users = DB::table('patients')
//            ->join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
//            ->get();

        return view('layouts.incomingtransfers', ['users' => $users]);
    }
    //indidual
    public function individual(Request $request, $id)
    {
       $users = Patient::join('facilities', 'patients.facility_id', '=' , 'facilities.mfl_code')
                             ->where('patients.id',[$id])
                            ->get(['patients.*','facilities.name']);


//        $users = DB::table('patients')
//            ->join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
//            ->get();

        return view('layouts.viewindividual', ['users' => $users]);
    }

    //allclients
    public function allclients()
    {
        $users = Patient::join('facilities', 'patients.facility_id', '=' , 'facilities.mfl_code')
                            ->get(['patients.*','facilities.name']);


//        $users = DB::table('patients')
//            ->join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
//            ->get();

        return view('layouts.viewclient', ['users' => $users]);
    }

    public function showclient($id)
    {
        $data = Http::get('http://localhost:3000/facility');
        $facilities = json_decode($data->getBody()->getContents());
        $patient = $this->optionCounty();


//        $users = DB::table('patients')->where('patients.id',[$id])
//            ->join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
//            ->get();



        $users = DB::select('select * from patients where id = ?', [$id]);

        return view('layouts.transferin', ['users' => $users],compact('facilities','patient'));
    }

    public function editc(Request $request, $id)
    {
        $fname = $request->input('fname');
        $mname = $request->input('mname');
        $lname = $request->input('lname');
        $Nemis = $request->input('Nemis');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $id_no = $request->input('id_no');
        $facility_id = $request->input('facility_id');
        $mfl_code = $request->input('mfl_code');
        $cccno = $request->input('CCC_Number');
        $residence = $request->input('Resident');
        $county = $request->input('county');
        $enddate = $request->input('enddate');
        $transferstatus = 1;
        $transferred_by = Auth::user()->name;
        /*$data=array('first_name'=>$first_name,"last_name"=>$last_name,"city_name"=>$city_name,"email"=>$email);*/
        /*DB::table('student')->update($data);*/
        /* DB::table('student')->whereIn('id', $id)->update($request->all());*/
        DB::update('update patients set facility2=?, transferstatus=?, enddate=?, dot=? where id = ?',
            [$facility_id, $transferstatus, $enddate, $enddate, $id]);

//        $pcreate = Patient::create([
////            'fname',
////            'mname',
////            'lname',
////            'nemis',
////            'dob',
////            'gender',s
////            'phone',
////            'id_no',
////            'cccno',
////            'residence',
////            'county',
////            'facility',
//
//            'fname' => $request->input('fname'),
//            'mname' => $request->input('mname'),
//            'lname' => $request->input('lname'),
//            'Nemis' => $request->input('Nemis'),
//            'dob' => $request->input('dob'),
//            'gender' => $request->input('gender'),
//            'phone' => $request->input('phone'),
//            'id_no' => $request->input('id_no'),
//            'facility_id' => $request->input('facility_id'),
//            'CCC_Number' => $request->input('CCC_Number'),
//            'Resident' => $request->input('Resident'),
//            'county' => $request->input('county'),
//            'transferin' => 1,
//            'transferred_by' => Auth::user()->name,
//            'created_by' => Auth::user()->name,
//            'updated_by' => Auth::user()->name,
//
//        ]);
        return 'success....Client Transfer has been iniated';
    }
    public function transferup(Request $request, $id)
    {
        $fname = $request->input('fname');
        $mname = $request->input('mname');
        $lname = $request->input('lname');
        $Nemis = $request->input('Nemis');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $id_no = $request->input('id_no');
        $facility_id = $request->input('facility_id');
        $cccno = $request->input('cccno');
        $residence = $request->input('residence');
        $county = $request->input('county');
        $enddate = $request->input('enddate');
        $rtransfer = $request->input('rtransfer');
        $transferred_by = Auth::user()->name;
        $transferstatus = $request->input('transferstatus');
        $mfl_code = $request->input('mflcode2');
        $rject = $request->input('rject');

        $check = 0;


        if ($transferstatus = 0) {
            DB::update('update patients set rject=?, rtransfer=?, facility2=?, transferstatus=?, enddate=?, dot=? where id = ?',
                [$rject, $rtransfer, 0, $transferstatus, 0, 0, $id]);
        } elseif ($transferstatus =2) {

            DB::update('update patients set rtransfer=?, facility2=?, transferstatus=?, enddate=?, dot=? where id = ?',
                [$rtransfer, 0, $transferstatus, $enddate, $enddate, $id]);

            $pcreate = Patient::create([

                'fname' => $request->input('fname'),
                'mname' => $request->input('mname'),
                'lname' => $request->input('lname'),
                'Nemis' => $request->input('Nemis'),
                'dob' => $request->input('dob'),
                'gender' => $request->input('gender'),
                'phone' => $request->input('phone'),
                'id_no' => $request->input('id_no'),
                'facility_id' => $request->input('facility_id'),
                'CCC_Number' => $request->input('CCC_Number'),
                'Resident' => $request->input('Resident'),
                'county' => $request->input('county'),
                'rtransfer' => $request->input('rtransfer'),
                'transferstatus' => 2,
                'transferred_by' => Auth::user()->name,
                'created_by' => Auth::user()->name,
                'updated_by' => Auth::user()->name,

            ]);
            return ('Sucess...');

        } else {
            return ('Error');
        }
    }
}
