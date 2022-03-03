<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\facility;

class Patient extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function facility()
    {
        $this->belongsTo(facility::class);
    }    

    
}
