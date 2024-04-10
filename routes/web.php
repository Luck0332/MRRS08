<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyAuth;
use App\Http\Controllers\reservationController;
use App\Http\Controllers\RoomController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

// Route::get('/Homepage',function(){
//     return view('Homepage');
// });

Route::get('/roominfo/{id}/{reserv_room}', [RoomController::class, 'show'])->name('roominfo');;




Route::get('/follow', [UserController::class,'getFollow']);
Route::get('/fillInformation/{id}/{reserv_room}', [UserController::class,'getInformation'])->name('fillInformation');;
Route::get('/calender', [UserController::class,'getcalender']);


Route::get('/Employee',[EmployeeController::class,'mainpage']);
Route::get('/Reserve',[EmployeeController::class,'reserve']);


Route::get('/get-reservation-details/{id}',[reservationController::class,'getReservationDetails'])->name('get-reservation-details');
Route::get('/Reservation_list',[reservationController::class,'reservation_list'])->name('show_reservation_list');
Route::put('/Reservation_list/{id}', [reservationController::class, 'updateReservation_Cancel'])->name('reservation_list_Cancel');
Route::get('/Statistics',[EmployeeController::class,'statistics']);

Route::get('/Manage_account',[EmployeeController::class,'manage_account']);
Route::get('/Manage_rooms',[EmployeeController::class,'manage_rooms']);
Route::get('/Accout', [EmployeeController::class, 'accout'])->name('account');


Route::get('/login' , [MyAuth::class,'login_view']);
Route::get('/logout' , [MyAuth::class,'logout_prrocess']);
Route::post('/login' , [MyAuth::class,'login_process']);
Route::get('reservations/byMonth', [EmployeeController::class, 'getReservationsByMonth'])->name('reservations.byMonth');


Route::get('/roominfo/{roomId}', [RoomController::class, 'show'])->name('roominfo');
Route::get('/User', [UserController::class,'getReserve']);
Route::post('/submit-form',[UserController::class, 'Submission'])->name('submit.form');
Route::get('/fillInformation/{id}/{start_date}/{end_date}', [UserController::class,'getInformation'])->name('fillInformation');
Route::post('/Reserve/store', [UserController::class, 'StoreInfo'])->name('reservation.StoreInfo');
// Route::get('/Success/{req}', [UserController::class, 'ToSuccess'])->name('Reserve_success');
Route::get('/Success/{id}', [UserController::class, 'ToSuccess'])->name('Reserve_success');



//route for managing rooms
Route::get('/Manage_rooms',[RoomController::class,'manage_rooms'])->name('titles_Employee.manage_rooms');
Route::get('/Manage_rooms/add-rooms',[RoomController::class,'create_rooms'])->name('titles_Employee.add_rooms');
Route::post('/Manage_rooms', [RoomController::class, 'store_rooms'])->name('titles_Employee.store_rooms');
Route::get('/Manage_rooms/{rooms}/edit-rooms', [RoomController::class, 'edit_rooms'])->name('titles_Employee.edit_rooms');
Route::put('/Manage_rooms/{rooms}/update-rooms', [RoomController::class, 'update_rooms'])->name('titles_Employee.update_rooms');
Route::delete('/Manage_account/{rooms}/destroy-rooms', [RoomController::class, 'destroy_rooms'])->name('titles_Employee.destroy-rooms');

//route for managing users ไว้เข้าถึงหน้าใน Employee
Route::get('/Manage_account',[EmployeeController::class,'manage_account'])->name('titles_Employee.manage_account');
Route::get('/Manage_account/add-user', [EmployeeController::class, 'create_user'])->name('titles_Employee.add_account_user');
Route::post('/Manage_account', [EmployeeController::class, 'store_user'])->name('titles_Employee.store');
Route::get('/Manage_account/{user}/edit-user', [EmployeeController::class, 'edit_user'])->name('titles_Employee.edit_user');
Route::put('/Manage_account/{user}/update-user', [EmployeeController::class, 'update_user'])->name('titles_Employee.update_user');
Route::delete('/Manage_account/{user}/destroy-user', [EmployeeController::class, 'destroy_user'])->name('titles_Employee.destroy-user');


Route::get('/Petition_detail/{id}',[EmployeeController::class,'getPetitionDetails'])->name('get-details');
Route::get('/Petition',[EmployeeController::class,'petition'])->name('pageW');
Route::put('/Petition/{id}', [EmployeeController::class, 'updatePetitionW'])->name('Petition_statuses.updateW');

Route::get('/Petition_reject_detail/{id}',[EmployeeController::class,'getPetitionDetailsReject'])->name('get-popup');
Route::put('/Petition_reject/{id}', [EmployeeController::class, 'updatePetitionR'])->name('Petition_statuses.updateR');
Route::get('/Petition_reject',[EmployeeController::class,'petition_reject'])->name('pageR');



