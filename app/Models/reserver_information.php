<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<<< HEAD:app/Models/reserver_information.php
use Illuminate\Foundation\Auth\reserver_information as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class reserver_information extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'reserver_information';
========
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class approves extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'approves';
>>>>>>>> Approve-list-NewV.2:app/Models/approves.php
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
<<<<<<<< HEAD:app/Models/reserver_information.php
        'reserver_fname',
        'reserver_lname',
        'reserver_tel',
        'us_lineid',
        'created_at',
        'updated_at',
========
        'app_status_reserve',
        'app_note',
        'app_update_statusroom',
        'app_update_statusroomA',
        'app_update_statusroomB',
        'rec_id',
>>>>>>>> Approve-list-NewV.2:app/Models/approves.php
        'res_id',
        'ro_id',
        'us_id',
    ];

}
