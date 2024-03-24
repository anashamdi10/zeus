<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
   protected $fillable=['id','name','email','phone','file','body','user_id'];


   public function user(){
       return $this->belongsTo(User::class);
   }

   public function getFileAttribute(){
       return url('public/storage').'/'.$this->attributes['file'];
   }
}
