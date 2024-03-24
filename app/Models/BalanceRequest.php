<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceRequest extends Model
{
    /**
     * @var string[]
     */
    protected  $guarded=['id'];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }


    public function getImageAttribute(){
        return url('public/storage').'/'.$this->attributes['image'];
    }
}
