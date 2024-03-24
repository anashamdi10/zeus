<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $fillable=['id','name_ar','name_en','desc_ar','desc_en','s_id'];
}
