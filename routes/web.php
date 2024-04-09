<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyAuth;
use App\Http\Controllers\reservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Test', function () {
    return view('Homepage');
});

Route::get('/Homepage',function(){
    return view('Homepage');
});

Route::get('/info',function(){
    return view('titles_User.room_info');
});

Route::get('/User', [UserController::class,'getReserve']);
Route::get('/follow', [UserController::class,'getFollow']);
Route::get('/getsearch/{date}', [UserController::class, 'getSearch'])->name('getsearch');
Route::get('/fillInformation', [UserController::class,'getInformation']);
Route::get('/calender', [UserController::class,'getcalender']);

Route::post('/submit-form', [UserController::class, 'handleFormSubmission'])->name('submit.form');

Route::get('/Employee',[EmployeeController::class,'mainpage']);
Route::get('/Reserve',[EmployeeController::class,'reserve']);
Route::get('/Petition',[EmployeeController::class,'petition'])->name('test');
Route::get('/get-Petition/{id}',[EmployeeController::class,'getPetition'])->name('get-Petition');

Route::get('/get-reservation-details/{id}',[reservationController::class,'getReservationDetails'])->name('get-reservation-details');
Route::get('/Reservation_list',[reservationController::class,'reservation_list'])->name('show_reservation_list');
Route::put('/Reservation_list/{id}', [reservationController::class, 'updateReservation_Cancel'])->name('reservation_list_Cancel');

Route::get('/Statistics',[EmployeeController::class,'statistics'])->name('titles_Employee.manage_account');
Route::get('/Manage_account',[EmployeeController::class,'manage_account']);
Route::get('/Manage_rooms',[EmployeeController::class,'manage_rooms']);
Route::get('/Accout',[EmployeeController::class,'accout']);

Route::get('/login' , [MyAuth::class,'login_view']);
Route::get('/logout' , [MyAuth::class,'logout_prrocess']);
Route::post('/login' , [MyAuth::class,'login_process']);

//route for managing users ไว้เข้าถึงหน้าใน Employee
Route::get('/Manage_account',[EmployeeController::class,'manage_account'])->name('titles_Employee.manage_account');
Route::get('/Manage_account/add-user', [EmployeeController::class, 'create_user'])->name('titles_Employee.add_account_user');
Route::post('/Manage_account', [EmployeeController::class, 'store_user'])->name('titles_Employee.store');
Route::get('/Manage_account/{user}/edit-user', [EmployeeController::class, 'edit_user'])->name('titles_Employee.edit_user');
Route::put('/Manage_account/{user}/update-user', [EmployeeController::class, 'update_user'])->name('titles_Employee.update_user');
Route::delete('/Manage_account/{user}/destroy-user', [EmployeeController::class, 'destroy_user'])->name('titles_Employee.destroy-user');


Route::post('/changeDataApprove', [EmployeeController::class, 'petition1'])->name('changeDataApprove');
Route::post('/changeDataReject', [EmployeeController::class, 'petition2'])->name('changeDataReject');


