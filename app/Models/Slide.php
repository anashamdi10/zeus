<?php

namespace App\Models;

use App\Models\Product;
//use TypiCMS\NestableTrait;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
//    use NestableTrait;

    /**
     * @var string
     */
    protected $table = 'slides';

    /**
     * @var array
     */
    protected $fillable = [
        'id','title', 'sub_title' , 'image', 'link','created_at', 'updated_at'
    ];

    /**
     * @var array
     */


    /**
     * @param $value
     */

    
}
