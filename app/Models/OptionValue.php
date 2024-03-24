<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{

    protected $hidden = ['created_at','updated_at'];
    protected $table = 'option_values';
    public $timestamps = true;
    protected $fillable = array('option_id','image','name_ar','name_en');

   public function option()
    {
        return $this->belongsTo(Option::class);
    }



}









