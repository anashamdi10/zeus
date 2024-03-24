<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public $timestamps = true;
    protected $fillable = array('payment_name','available','image','gateway');

   public function settings(){
        return $this->hasMany(PaymentMethodSetting::class);
    }

}









