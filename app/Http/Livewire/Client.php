<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use App\Models\PatientCategory;
use Livewire\WithPagination;


class Client extends Component
{
    use WithPagination;

    public $categories = [];
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
        $this->categories = PatientCategory::pluck('name', 'id');
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
        'patient_categories.name as category_name',
       ])
            ->leftJoin('patients_categories',
                'patients.patient_category_id',
                '=',
                'patient_category.id');
        foreach($this->searchColumns as $column =>$value) {
            if (!empty($value)){
                if ($column == 'patient-category_id') {
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
