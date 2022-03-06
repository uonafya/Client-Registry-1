<?php

namespace App\Exports;

use App\Models\Geolocation;
use Maatwebsite\Excel\Concerns\FromCollection;

class GeolocationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Geolocation::all();
    }
}
