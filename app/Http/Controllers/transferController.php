<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class transferController extends Controller
{
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
}
