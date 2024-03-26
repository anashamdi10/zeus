<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
   
    /**
     * @var string
     */
    protected $table = 'why_shoose';

    protected $fillable=['id','title','title_ar','pragraph_en','pragraph_ar','image'];




}
