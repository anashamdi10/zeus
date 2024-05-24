<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'certificates';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'image', 'title', 'title_ar','city', 'city_ar'
    ];
}
