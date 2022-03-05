<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FacilityController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;

use Illuminate\Http\Request;

use App\Models\Patient;

use App\Http\Controllers\EventController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login_register');
});

Route::post('login', [LoginController::class, 'login']);
// patients

Route::get('/dashboard', [FacilityController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::post('create_patient',[PatientController::class, 'store']);
Route::patch('patient/{id}',[PatientController::class, 'update']);

Route::get('/merger_patient/{id}/{id_no}',[PatientController::class, 'merge']);

Route::get('new_client', [PatientController::class, 'new_client']);

Route::get('allclients', [PatientController::class, 'allclients']);

Route::get('edit/{id}',[PatientController::class, 'showclient']);
Route::post('edit/{id}',[PatientController::class, 'editc']);

//Remote data source
Route::get('get_all_patients', [FacilityController::class, 'getPatient'] );
Route::get('get_all_facilities', [FacilityController::class, 'getFacility'] );
Route::post('add_patient', [FacilityController::class, 'addPatient'] );
Route::get('/search', [PatientController::class, 'search']);

Route::get('query_patient/{ccc_no}/', [PatientController::class, 'getPatientWithCCC']);
Route::get('query_facilities_patients/{mfl_code}/', [PatientController::class, 'getAllPatientsInFacility']);

Route::get('/event', [PatientController::class, 'updateEvent'])->name('event.index');


// 36104-74927
Route::get('/get_patient/{api_token}/{name}', function (Request $request) {

    $patient = Patient::where('CCC_Number',$request->name)->get();

    return $patient;
    // response()->json([
    //     // 'name' => $request->name,
    //     $patient

    // ]);
})->middleware('api_token');

Route::get('notify', function () {
    return view('welcome');
});
