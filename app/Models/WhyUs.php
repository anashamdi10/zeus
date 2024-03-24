<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    protected $fillable=['id','name_ar','name_en','desc_ar','desc_en','image'];



        public function getImageAttribute(){
            return url('public/storage').'/'.$this->attributes['image'];
    }
}
