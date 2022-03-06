<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;

class Search extends Component
{
    public $searchPatient;
    public $patient;

//     public function render()
//     {
//         $searchPatient = '%' . $this->$searchPatient . '%';

//         // $allPatients = Patient::all();
//         // dd($allPatients);

//         $this->patient=Patient::all();

//         $this->patient = Patient::where('fname', 'ilike', $searchPatient)->get();
//         return view('livewire.search');
//     }
 }
