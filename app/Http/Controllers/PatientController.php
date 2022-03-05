<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient, Request $request)
    {
    }

    public function search()
    {
        return view('search');
    }

    public function searchClient(Request $request){

        if($request->search_criteria == 'CCC Number'){
            // return 'searching by ccc';
            $ccc_no = (String) $request->actual_search;
            // dd($ccc_no);
            // "31001-20571"
            $pt = Patient::where('CCC_Number',$ccc_no   )->get();
            return $pt;


        }elseif($request->search_criteria == 'Facility'){
            // return 'search by fc';

            $facilityPatients = Patient::   where('facility_id', $request->actual_search)->get();

            //dd($facilityPatients);

            //return $facilityPatients;
            return view('layouts.search_facility_patient', compact('facilityPatients'));
        }elseif($request->search_criteria == 'National ID Number'){
            // return 'search by fc';

            $id_no = Patient::where('id_no', $request->actual_search)->get();
            //dd($id_no);
            //return $id_no;
            return view('layouts.search_patient_id', compact('id_no'));
        }elseif($request->search_criteria == 'Client Name'){
            // return 'search by fc';


            $client_name = $request->actual_search;

            $clients = DB::table('patients')->where('fname', '=', $fname)->orWhere('mname', '=', $mname)->orWhere('lname', '=', $lname)->get();




            $client_name = Patient::where('fname','mname','lname', $request->actual_search)->get();
            //dd($id_no);
            //return $id_no;
            return view('layouts.search_patient_name', compact('client_name'));
        }


        $searchQuery = $request->searchQuery;
    }

    // public function getPatientByCCC($ccc_no)
    // {
    // //    dd($ccc_no);
    //     return redirect()->to('/patient_by_ccc/'.$ccc_no);
    //     // redirect('patient_by_ccc/'.$ccc_no);
    // }

    // public function cccgetPatient(Request $req,$cccno)
    // {
    //     dd($cccno);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //        $data = $request->all();
        //        dd($data);

        Patient::create($request->all([

            $created_by =Auth::user()->name,

            'fname',
            'mname',
            'lname',
            'nemis',
            'dob',
            'gender',
            'phone',
            'id_no',

            'CCC_Number',
            'facility_id',
            'Nemis',
            'Resident',
            'created_by'=>$created_by,
         ]));

         return 'created';


    }

    public function new_client(Patient $patient)
    {
        $patient = $this->optionCounty();
        $facility = $this->optionFacility();
        return view('layouts.new_client', compact('patient', 'facility'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
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
            "dob" => "required",
            "gender" => 'required',
            "Geolocation" => 'required',
            "Phone" => "required",
            "id_no" => "required",
            "CCC_Number" => "required",
            "Link_facility" => "required",
            "nemis" => '',
            "Resident" => 'required',
            "Date_of_Transfer" => "required"
        ]);

        $patient->where('id', $req->id)->update($data);

        // $patient->update($data);
    }

    public function merge(Request $reqs)
    {
        $patient = Patient::find($reqs->id);
        $patient_exists = Patient::where('ID_Number', $reqs->id_no);

        if ($patient_exists->exists()) {
            dd($patient[0]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
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
            '1' => 'migori_hospital',
            '1' => 'muranga_hospital',
            '1' => 'nairobi_hospital',
            '1  ' => 'kissii_hospital',
        ];
    }



    //indidual
    public function clientapprej(Request $request, $id)
    {
//        $users = DB::select('select * from patients where id = ?', [$id]);


        $users = Patient::join('facilities', 'patients.facility_id', '=' , 'facilities.mfl_code')
            ->where('patients.id',[$id])
            ->get(['patients.*','facilities.name']);

        return view('layouts.incomingtransfers', ['users' => $users]);
    }
    //indidual
    public function individual(Request $request, $id)
    {
//        $users = DB::select('select * from patients where id = ?', [$id]);


        $users = Patient::join('facilities', 'patients.facility_id', '=' , 'facilities.mfl_code')
            ->where('patients.id',[$id])
            ->get(['patients.*','facilities.name']);

        return view('layouts.viewindividual', ['users' => $users]);
    }

    //allclients
    public function allclients()
    {
//        $users = DB::table('patients')
////            // ->where('void',1)
//            ->paginate(10);


        $users = Patient::join('facilities', 'patients.facility_id', '=' , 'facilities.mfl_code')
            ->get(['patients.*','facilities.name']);

        return view('layouts.viewclient',['users' => $users]);
    }

    public function showclient($id)
    {
        $users = DB::select('select * from patients where id = ?', [$id]);
        return view('layouts.transferin', ['users' => $users]);
    }
    public function editc(Request $request, $id)
    {
        $fname = $request->input('fname');
        $mname = $request->input('mname');
        $lname = $request->input('lname');
        $nemis = $request->input('nemis');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $id_no = $request->input('id_no');
        $facility_id= $request->input('facility_id');
        $cccno = $request->input('cccno');
        $residence = $request->input('residence');
        $county = $request->input('county');
        $enddate = $request->input('enddate');
        $rtransfer = $request->input('rtransfer');
        $mfl_code = $request->input('mfl_code');
        $transferstatus = 1;
        $transferred_by = Auth::user()->name;
        /*$data=array('first_name'=>$first_name,"last_name"=>$last_name,"city_name"=>$city_name,"email"=>$email);*/
        /*DB::table('student')->update($data);*/
        /* DB::table('student')->whereIn('id', $id)->update($request->all());*/
        DB::update('update patients set mflcode2=?, rtransfer=?, facility2=?, transferstatus=?, enddate=?, dot=? where id = ?',
            [$mfl_code, $rtransfer,$facility_id, $transferstatus, $enddate, $enddate, $id]);
//
//
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
        return ('Sucess...Client transfer has been  initiated');

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

        $check =0;


        if ($transferstatus = $check){
            DB::update('update patients set rject=?, rtransfer=?, facility2=?, transferstatus=?, enddate=?, dot=? where id = ?',
                [$rject,$rtransfer,0, $transferstatus, 0, 0, $id]);
        }elseif($transferstatus > $check){

            DB::update('update patients set rtransfer=?, facility2=?, transferstatus=?, enddate=?, dot=? where id = ?',
                [$rtransfer, 0,$transferstatus, $enddate, $enddate, $id]);

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
                'rtransfer' => $request->input('retransfer'),
                'transferstatus' => 2,
                'transferred_by' => Auth::user()->name,
                'created_by' => Auth::user()->name,
                'updated_by' => Auth::user()->name,

            ]);
            return ('Sucess...');

        }else{
            return ('Error');
        }

    }
}
