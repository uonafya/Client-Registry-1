<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use Livewire\WithPagination;


class Client extends Component
{
    use WithPagination;

    public $patients = [];
    public $sortColumn = 'name';
    public $sortDirection = 'asc';
    public $searchColumns = [
        'fname' => '',
        'mname' => '',
        'lname' => '',
        'id_no' => '',
        'CCC_Number' => '',
    ];

    public function mount()
    {
        $this->patient = Patient::pluck('fname', 'id');
    }

    //sort table Column

    public function sortByColumn($column)
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        }
        else {
            $this->reset('sortDirection');
            $this->sortColumn = $column;    
        }
    }

    public function updating($value, $name)
    {
        $this->resetPage();
    }


    //render patient data from the db
    public function render()
    {
       $patients = Patient::select([
        'patients.fname',
        'patients.mname',
        'patients.lname',
        'patients..id_no',
        'patients.CCC_Number',
        'patient.name as category_name',
       ])
            ->leftJoin('patients',
                'patients.patient_id',
                '=',
                'patient.id');
        foreach($this->searchColumns as $column =>$value) {
            if (!empty($value)){
                if ($column == 'patient-id') {
                    $patient->where($column, $value);
                }
                else{
                    $patients->where('patients.' .$column, 'LIKE', '%' . $value . '%');
                }
            }
        }

        return view('livewire.patient', [
            'patients' => $patients->paginate(20)
        ]);
    }
}
