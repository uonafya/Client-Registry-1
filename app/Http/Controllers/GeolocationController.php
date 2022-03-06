<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GeolocationImport;
use App\Exports\GeolocationExport;
use Exception;

class GeolocationController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('file-import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request)
    {
        // Excel::import(new GeolocationImport, $request->file('file')->store('temp'));
        // return back();

        $validatedData = $request->validate([
            'file' => 'required',
        ]);

        Excel::import(new GeolocationImport,$request->file('file'));

        return redirect('import-excel-csv')->with('status', 'The file has been imported in laravel 8');

    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport()
    {
        return Excel::download(new GeolocationExport, 'geolocation-collection.xlsx');
    }


    public function importForm()
    {
        return view('import-form');
    }

    public function import(Request $request)
    {
        // dd($request->file);

        Excel::import(new GeolocationImport , $request->file);
        return back();
    }
}
