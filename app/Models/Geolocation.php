<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geolocation extends Model
{
    use HasFactory;

    // $table->integer('geo_id');
    // $table->string('name');
    // $table->string('parent_id');

    protected $fillable = [
        'geolocation_id',
        'name',
        'parent_id'
    ];
}
