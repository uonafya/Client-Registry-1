<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Patient;

class Facility extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function patient()
    {
      return $this->hasMany(Patient::class);
    }
    
}
