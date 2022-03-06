<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfers extends Model
{

    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'Nemis',
        'dob',
        'gender',
        'phone',
        'id_no',
        'facility_id',
        'CCC_Number',
        'Resident',
        'rtransfer',
        'ifacility',
        'transferstatus',
        'transferred_by'
    ];
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function scopeActive()
    {
        return where('void',1);
    }

}
