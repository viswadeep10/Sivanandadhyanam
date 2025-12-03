<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Coupan extends Model
{
    
    protected $fillable = [
        'title',
        'email',
        'discount',
        'attemp',
        'status',
    ];

   
}
