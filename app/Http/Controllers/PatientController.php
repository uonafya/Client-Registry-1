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
            'name',
            'DOB', 
            'gender', 
            'Geolocation',
            'Phone',
            'ID_Number',
            'CCC_Number', 
            'Nemis', 
            'Resident',
            'Date_of_Transfer' 
         ]));
        
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
        $data = request()->validate([
            "name" => "required",
            "DOB" =>"required",
            "gender" => 'required',
            "Geolocation" => 'required',
            "Phone" => "required",
            "ID_Number" => "required",
            "CCC_Number" => "required",
            "Nemis" => 'required',
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
}
