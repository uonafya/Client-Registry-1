<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

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
            'Geolocation',
            'phone',
            'id_no',
            'CCC_Number', 
            'nemis', 
            'Resident',
            'Date_of_Transfer' 
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
            "Geolocation" => 'required',
            "Phone" => "required",
            "id_no" => "required",
            "CCC_Number" => "required",
            "nemis" => '',
            "Resident" => 'required',
            "Date_of_Transfer" =>  "required"
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
    
    
}
