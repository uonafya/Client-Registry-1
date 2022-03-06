<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;

use App\Http\Controllers\PatientController;
use App\Http\Controllers\GeolocationController;

use Illuminate\Http\Request;

use App\Models\Patient;

use App\Http\Controllers\EventController;
use App\Http\Controllers\AccessAPIController;


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
Route::get('documentation', [LoginController::class, 'documentation']);
Route::get('register_user', [UserController::class, 'new_user']);

Route::get('allclients', [PatientController::class, 'allclients']);

Route::get('individual/{id}', [PatientController::class, 'individual']);

Route::get('clientapprej/{id}', [PatientController::class, 'clientapprej']);

Route::get('edit/{id}',[PatientController::class, 'showclient']);

Route::post('edit/{id}',[PatientController::class, 'editc']);
Route::get('update_client/{id}',[PatientController::class, 'updateclient']);
Route::post('update_client/{id}',[PatientController::class, 'edit']);
Route::post('editc/{id}',[PatientController::class, 'editc']);


//Remote data source
Route::get('get_all_patients', [FacilityController::class, 'getPatient'] );
Route::get('get_all_facilities', [FacilityController::class, 'getFacility'] );
Route::post('add_patient', [FacilityController::class, 'addPatient'] );
Route::get('/search', [PatientController::class, 'search']);

Route::get('query_patient/{ccc_no}/', [PatientController::class, 'getPatientWithCCC']);
Route::get('query_facilities_patients/{mfl_code}/', [PatientController::class, 'getAllPatientsInFacility']);

Route::get('/event', [PatientController::class, 'updateEvent'])->name('event.index');

Route::get('/get_access/', [AccessAPIController::class, 'getToken']);
Route::get('/get_patient/{api_token}/{name}',[AccessAPIController::class, 'getPatientWithCCC'])->middleware('api_token');
Route::get('/get_facility/{api_token}/{mflcode}',[AccessAPIController::class, 'getFacilityByMfl'])->middleware('api_token');

Route::get('notify', function () {
    return view('welcome');
});

Route::get('file-import-export', [GeolocationController::class, 'fileImportExport']);
Route::post('file-import', [GeolocationController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [GeolocationController::class, 'fileExport'])->name('file-export');

Route::post('/import', [GeolocationController::class, 'import'])->name('import');
Route::post('search-query', [PatientController::class, 'searchClient']);



Route::get('/mail/send', [MailController::class, 'send']);

Route::post('transferup/{id}',[PatientController::class, 'transferup']);

Route::get('transfers',[PatientController::class, 'transfers']);
