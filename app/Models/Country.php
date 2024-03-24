<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
   protected $guarded=['id'];

    public function getImageAttribute(){
       return url('storage/countries').'/'.$this->attributes['image'];
    }

   public function cities(){
       return $this->hasMany(City::class);
   }
   
  
}
