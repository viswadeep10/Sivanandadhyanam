<?php

// app/Models/Complaint.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'order_id', 'complain_type', 'complain'
    ];
}
