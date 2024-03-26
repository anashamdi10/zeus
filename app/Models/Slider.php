<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'sliders';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'sub_title', 'link', 'title_ar', 'sub_title_ar','created_at', 'updated_at'
    ];

}
