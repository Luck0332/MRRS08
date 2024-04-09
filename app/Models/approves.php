<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class approves extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'approves';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'app_status_reserve',
        'app_note',
        'app_update_statusroom',
        'app_update_statusroomA',
        'app_update_statusroomB',
        'rec_id',
        'res_id',
        'ro_id',
        'us_id',
    ];

}
