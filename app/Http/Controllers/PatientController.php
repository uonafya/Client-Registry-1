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


            // $client_name = $request->actual_search;

            // $clients = DB::table('patients')->where('fname', '=', $fname)->orWhere('mname', '=', $mname)->orWhere('lname', '=', $lname)->get();
            
            


            // $client_name = Patient::where('fname','mname','lname', $request->actual_search)->get();
            // //dd($id_no);
            // //return $id_no;
            $clientName = Patient::where('fname', $request->actual_search)->get();
            return view('layouts.search_patient_name', compact('clientName'));
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
            'fname',
            'mname',
            'lname',
            'nemis',
            'dob',
            'gender',
            'phone',
            'id_no',
            'cccno',
            'residence',
            'county',
            'facility',
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

    //allcustomers
    public function allclients()
    {
        $users = DB::table('patients')->paginate(10);

        return view('layouts.viewclient', ['users' => $users]);
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
        $facility = $request->input('facility');
        $cccno = $request->input('cccno');
        $residence = $request->input('residence');
        $county = $request->input('county');
        $enddate = $request->input('enddate');
        $transferin = 1;
        /*$data=array('first_name'=>$first_name,"last_name"=>$last_name,"city_name"=>$city_name,"email"=>$email);*/
        /*DB::table('student')->update($data);*/
        /* DB::table('student')->whereIn('id', $id)->update($request->all());*/
        DB::update('update patients set transferin = ?,enddate=? where id = ?', [$transferin, $enddate, $phone, $id]);

        Patient::create($request->all([
            'fname',
            'mname',
            'lname',
            'nemis',
            'dob',
            'gender',
            'phone',
            'id_no',
            'cccno',
            'residence',
            'county',
            'facility',
        ]));
        return view('viewclient');
    }
}
