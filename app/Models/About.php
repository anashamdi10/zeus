<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'about';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'image', 'title', 'pragraph', 'title_ar', 'pragraph_ar' , 'title_certificates', 'title_certificates_ar'
    ];
}
