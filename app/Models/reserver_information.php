<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class reserver_information extends Model
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'reserver_information';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reserver_fname',
        'reserver_lname',
        'reserver_tel',
        'us_lineid',
    ];

}
