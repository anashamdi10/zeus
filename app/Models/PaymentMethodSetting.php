<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethodSetting extends Model
{
    public $timestamps = true;
    protected $fillable = array('payment_method_id','domain','type','marchent_id','secret_key','token');

   

}









