<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    protected $hidden = ['created_at','updated_at'];
    protected $table = 'coupons';
    public $timestamps = true;
    protected $fillable = array('code','end_time','type','amount');

}









