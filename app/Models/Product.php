<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Product extends Model
{
    
    protected $fillable = [
        'name',
        'program_id',
        'sub_program_id',
        'price',
        'description',
        'status',
    ];

        public function courses(): HasMany
        {
            return $this->hasMany(Course::class);
        }

}
