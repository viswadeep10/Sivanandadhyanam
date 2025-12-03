<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class ServicePayment extends Model
{
    
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'enrolment_no',
        'programme',
        'service',
        'other',
        'r_payment_id',
        'r_order_id',
        'method',
        'currency',
        'amount',
        'json_response',
        'status'
    ];

    public function services(): BelongsTo
    {
        return $this->belongsTo(Service::class,'service','id');
    }

}
