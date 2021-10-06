<?php

use Illuminate\Support\Facades\Route;

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
    return view('newlogin');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');
Route::get('/', function () {
    if (Auth::check()) {
        return view('admin.dashboard');
    }
    return view('newlogin');
})->name('login');
Route::get('dashboard', 'AdminController@index')->middleware('auth');



//Phone Book
Route::get('/phone_book','PhoneBookController@index');
Route::get('/PhoneBook/ChangeResponseStatus/{id}','PhoneBookController@ChangeResponseStatus');
// Route::get('/edit_contact/{id}','PhoneBookController@create');
Route::get('/phonebook_form/{id}','PhoneBookController@create');
Route::post('/phonebook_create','PhoneBookController@store');
Route::put('/phonebook_update/{id}','PhoneBookController@update');
Route::put('/phonebook_delete/{id}','PhoneBookController@destroy');
Route::delete('/delete_null_caller_values','PhoneBookController@DeleteNullValues');
Route::put('/assign_manager','PhoneBookController@AssignManager');
Route::put('/assign_manager','PhoneBookController@AssignManager');
Route::get('/contacts/{filter}','PhoneBookController@ContactView');


//Leads
Route::get('/lead','LeadController@index');
Route::get('/create_lead','LeadController@create');

//Services
Route::get('/visa','ServiceController@getVisa');
Route::get('/create_visa','ServiceController@createVisa');
Route::get('/transport','ServiceController@getTransport');
Route::get('/create_transport','ServiceController@createTransport');
Route::get('/hotel','ServiceController@getHotel');
Route::get('/create_hotel','ServiceController@createHotel');
Route::post('file-import', 'PhoneBookController@fileImport')->name('file-import');

// route response status
Route::put('response_status/{id}','PhoneBookController@StoreResponseStatus');

// route for lead generate
Route::get('lead_generate/{id}','LeadController@create');
Route::post('lead_generate_store','LeadController@store');



//Services
Route::get('/visa','ServiceController@getVisa');
Route::get('/create_visa/{id}','ServiceController@createVisa');
Route::get('/transport','ServiceController@getTransport');
Route::get('/create_transport/{id}','ServiceController@createTransport');
Route::get('/hotel','ServiceController@getHotel');
Route::get('/create_hotel/{id}','ServiceController@createHotel');
Route::post('file-import', 'PhoneBookController@fileImport')->name('file-import');
//Crud Srvices
Route::post('/Visa/Create', 'ServiceController@store');
Route::post('/Transport/Create', 'ServiceController@storeTransport');
Route::post('/Hotel/Create', 'ServiceController@storeHotel');


// route response status
Route::put('response_status/{id}','PhoneBookController@StoreResponseStatus');


// route filters

Route::get('phone_book/{filter}','PhoneBookController@show');