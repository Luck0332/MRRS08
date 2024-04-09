<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyAuth;
use App\Models\reserver_information;
use App\Models\Room;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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
Route::get('/success',[UserController::class,'getSuccess']);
Route::get('/fill_Information', [UserController::class,'getInformation'])->name('fill_Information');
Route::post('/success', [AuthController::class,'userInformation'])->name('fill_Information.add');
Route::get('/lineAuth',[UserController::class,'getlineAuth']);
Route::get('/searchRoom', [UserController::class,'getSearch']);


Route::get('/Employee',[EmployeeController::class,'mainpage']);
Route::get('/Reserve',[EmployeeController::class,'reserve']);
Route::get('/Petition',[EmployeeController::class,'petition']);
Route::get('/Reservation_list',[EmployeeController::class,'reservation_list']);
Route::get('/Statistics',[EmployeeController::class,'statistics']);

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


