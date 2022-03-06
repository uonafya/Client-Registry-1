<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;

use App\Models\Facility;

class Patient extends Model
{
    use HasFactory;
    //use HasFactory, Notifiable, Searchable;

    protected $guarded=[];

    public function facility()
    {
       return $this->belongsTo(Facility::class);
    }

    // public function scopeActive()
    // {
    //     return where('void',1);
    // }


}
