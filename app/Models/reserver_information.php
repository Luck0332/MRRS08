<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserver_information extends Model
{
    use HasFactory;
    protected $table = 'reserver_information';
    protected $fillable = [
        'id',
        'reserver_fname',
        'reserver_lname',
        'reserver_tel',
        'us_lined',
    ];
}


