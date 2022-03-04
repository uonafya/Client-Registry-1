<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Facility;

class Patient extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function facility()
    {
       return $this->belongsTo(Facility::class);
    }

    public function scopeActive()
    {
        return where('void',1);
    }


}
