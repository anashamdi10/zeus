<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;
    protected $fillable = array('name_ar','name_en','sort_order','type');

    public function productOptions(){
        return $this->hasMany(ProductOption::class);
    }
    
    public function values(){
        return $this->hasMany(OptionValue::class);
    }
    
    public function product_option_values(){
        return $this->hasMany(ProductOptionValue::class);
    }

}









