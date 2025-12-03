<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    
    protected $fillable = [
        'category_id',
        'brief_info',
        'brif_info_hindi',
        'solution',
        'solution_hindi',
        'pdf',
        'programe',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
