<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Geolocation;

class GeolocationImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Geolocation([
            'geolocation_id' => $row["geolocation_id"],
            'name'    => $row["name"],
            'parent_id' => $row["parent_id"]
            // Hash::make($row[2])
        ]);
    }
}
