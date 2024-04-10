<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'reserver_fname',
        'reserver_lname',
        'reserver_tel',
        'us_lined',
        'created_at',
        'updated_at',
    ];
}
