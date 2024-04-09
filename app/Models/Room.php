<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Room extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ro_id',
        'ro_name',
        'ro_size',
        'ro_description',
        'ro_typeroom',
        'ro_price',
        'ro_capacity',
        'ro_avaliable',
        'ro_cansprit',
        'ro_subroomA',
        'ro_subroomB',
        'ro_statusroomA',
        'ro_statusroomB'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

}
