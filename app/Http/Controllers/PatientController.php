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
        $users = Patient::join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
            ->where('patients.void', 0)
            ->get(['patients.*', 'facilities.name']);


        return view('search', ['users' => $users]);
        //return view('search');
    }


    //    public function search()
    //    {
    //        return view('search');
    //    }

    function cleanName($str) {
  
        // Using str_replace() function 
        // to replace the word 
        $res = str_replace( array( '\'', '"',
        '\'' , ';', '<', '>' ), ' ', $str);
    
        // Returning the result 
        return $res;
        }


    public function searchClient(Request $request)
    {

        if ($request->search_criteria == 'CCC Number') {
            // return 'searching by ccc';
            // $ccc_no = (string) $request->actual_search;
            // // dd($ccc_no);
            // // "31001-20571"
            // $pt = Patient::join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
            //     ->where('patients.void', 0)
            //     ->where('CCC_Number', $request->actual_search)->get(['patients.*', 'facilities.name']);

            // return $pt;


            $ccc_no = Patient::query()
                ->where('patients.void', 0)
                ->where('CCC_Number', 'LIKE', "%{$request->actual_search}%")->get();
            // ->orWhere('mname', 'LIKE', "%{$request->actual_search}%")
            // ->orWhere('lname', 'LIKE', "%{$request->actual_search}%")
            // ->get();

            return view('layouts.search_patient_no', compact('ccc_no'));
        } elseif ($request->search_criteria == 'Facility') {
            // return 'search by fc';
            // $users = Patient::join('facilities', 'patients.facility_id', '=' , 'facilities.mfl_code')
            // ->get(['patients.*','facilities.name'])
            // ->where('id',$id);

            $facilityPatients = Patient::join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
                ->where('patients.void', 0)
                ->where('facility_id', $request->actual_search)->get(['patients.*', 'facilities.name']);

            //dd($facilityPatients);

            //return $facilityPatients;
            return view('layouts.search_facility_patient', compact('facilityPatients'));
        } elseif ($request->search_criteria == 'National ID Number') {
            // return 'search by fc';

            $id_no = Patient::join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
                ->where('patients.void', 0)
                ->orWhere('id_no', $request->actual_search)->get(['patients.*', 'facilities.name']);

            //dd($id_no);
            //return $id_no;
            return view('layouts.search_patient_id', compact('id_no'));
        } elseif ($request->search_criteria == 'Client Name') {
            // return 'search by fc';
            $client_name = Patient::query()
                ->where('fname', 'LIKE', "%{$request->actual_search}%")
                ->orWhere('mname', 'LIKE', "%{$request->actual_search}%")
                ->orWhere('lname', 'LIKE', "%{$request->actual_search}%")
                //->orWhere('patients.void', 0)
                ->get();
            
            //dd($clientName);
            //$client_name = $this->cleanName($clientName);

            //dd($client_name);

            //dd($clients);

            // $client_name = Patient::where('fname','mname','lname', $request->actual_search)->get();
            // //dd($id_no);
            // //return $id_no;
            //$ccc_no = (string) $request->actual_search;
            // $client_name = Patient::join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
            //     ->where('patients.void', 0)
            //     ->where('fname', $request->actual_search)->get(['patients.*', 'fname']);
            return view('layouts.search_patient_name', compact('client_name'));
        }


        $searchQuery = $request->searchQuery;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient, Request $request)
    {


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

        return back()->with(['success' => 'Client created successfully']);
    }

    // public function patient_facility(Patient $patient)
    // {
    //     // $data = Http::get('http://localhost:3000/facility');
    //     // $facilities = json_decode($data->getBody()->getContents());

    //     // $patient = $this->optionCounty();
    //     //$this->getFacility();

    //     return view('layouts.search_facility_patient'));
    // }

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
        $facility_id = $request->input('mfl_code');
        $cccno = $request->input('CCC_Number');
        $residence = $request->input('Resident');
        $county = $request->input('county');

        DB::table('patients')
            ->where('id', $id)
            ->update([
                'fname' => $fname, 'mname' => $mname, 'lname' => $lname, 'dob' => $dob,
                'gender' => $gender, 'Nemis' => $nemis,
                'phone' => $phone, 'id_no' => $id_no, 'facility_id' => $facility_id, 'CCC_Number' => $cccno,
                'Resident' => $residence
            ]);


        return back()->with(['success' => 'Details updated successfully']);
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
            "dob" => "required",
            "gender" => 'required',
            "Phone" => "required",
            "id_no" => "required",
            "CCC_Number" => "required",
            "Nemis" => '',
            "Resident" => 'required',
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

        $users = Patient::join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
            ->get(['patients.*', 'facilities.name'])
            ->where('id', $id);



        return view('layouts.edit_client', compact('patient', 'users', 'facilities'));
    }

    //indidual
    public function clientapprej(Request $request, $id)
    {
        $users = DB::table('patients')
            ->join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
            ->get(['patients.*', 'facilities.name'])
            ->where('id', $id);

        //        return $users;



        $facilityto = Patient::join('facilities', 'patients.facility2', '=', 'facilities.mfl_code')
            ->get(['patients.*', 'facilities.name'])
            ->where('id', $id);

        $facilityobj = $facilityto[0];


        return view('layouts.incomingtransfers', ['users' => $users], compact('facilityobj'));
    }
    //indidual
    public function individual(Request $request, $id)
    {
        $users = Patient::join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
            ->where('patients.id', [$id])
            ->get(['patients.*', 'facilities.name']);


        //        $users = DB::table('patients')
        //            ->join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
        //            ->get();

        return view('layouts.viewindividual', ['users' => $users]);
    }

    //allclients
    public function allclients()
    {
        $users = Patient::join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
            ->where('patients.void', 0)
            ->get(['patients.*', 'facilities.name']);


        return view('layouts.viewclient', ['users' => $users]);
    }
    //transfers
    public function transfers()
    {
        $users = Patient::join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
            ->where('patients.transferstatus', 1)
            ->get(['patients.*', 'facilities.name']);


        //        $users = DB::table('patients')
        //            ->join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
        //            ->get();

        return view('layouts.transfers', ['users' => $users]);
    }

    public function showclient($id)
    {
        $data = Http::get('http://localhost:3000/facility');
        $facilities = json_decode($data->getBody()->getContents());
        $patient = $this->optionCounty();


        $users = Patient::join('facilities', 'patients.facility_id', '=', 'facilities.mfl_code')
            ->where('patients.id', [$id])
            ->get(['patients.*', 'facilities.name']);

        //
        //        $users = DB::select('select * from patients where id = ?', [$id]);

        return view('layouts.transferin', ['users' => $users], compact('facilities', 'patient'));
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
        DB::update(
            'update patients set  facility2=?, transferstatus=?, enddate=?, dot=? where id = ?',
            [$facility_id, $transferstatus, $enddate, $enddate, $id]
        );

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
        // return 'success....Client Transfer has been iniated';
        return back()->with(['success' => 'Client Transfer has been initiated successfully']);
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
        $void = 1;
        $trs = $transferstatus;
        $check = 0;


        if ($check == $trs) {
            DB::update(
                'update patients set rject=?, rtransfer=?,  transferstatus=?, enddate=?, dot=? where id = ?',
                [$rject, $rtransfer, $transferstatus, "2022-03-06 12:01:07", "2022-03-06 12:01:07", $id]
            );
        } else {

            DB::update(
                'update patients set void=?, rtransfer=?, transferstatus=?, enddate=?, dot=? where id = ?',
                [$void, $rtransfer, $transferstatus, $enddate, $enddate, $id]
            );

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
            return back()->with(['success' => 'Client Transfer completed successfully']);
        }
    }
}
