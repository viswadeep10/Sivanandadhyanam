<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'r_payment_id',
        'r_order_id',
        'name',
        'method',
        'currency',
        'email',
        'phone',
        'amount',
        'status',
        'json_response',
        'cart',
        'coupan_id',
    ];


    public function coupan()
    {
        return $this->belongsTo(Coupan::class);
    }

}
