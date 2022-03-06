<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\Patient;
use App\Helpers\Http;

class AccessAPIController extends Model
{
    use HasFactory;

    public function getPatientWithCCC(Patient $patient, Request $req)
    {
        $search_obj = $patient->where('CCC_Number', $req->ccc_no)->get();
        // dump($search_obj);
        return $search_obj;
    }



}
