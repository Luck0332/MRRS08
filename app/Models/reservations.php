<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\reservations as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class reservations extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'reservations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'res_id',
        'res_status',
        'res_startdate',
        'res_enddate',
        'res_serialcode',
        'res_total',
        'res_typeroom',
        'res_dayType',
        'room_id',
        'reserver_id',
        'resinfo_id',
    ];

}
