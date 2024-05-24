<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'facilities';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'title_ar', 'pragraph', 'pragraph_ar', 'image'
    ];
}
