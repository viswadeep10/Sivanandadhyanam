<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $fillable = [
        'name',
        'poster_image',
        'media',
        'status',
        'start_time',
        'position'
    ];
}
