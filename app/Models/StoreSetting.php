<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreSetting extends Model
{
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;
    protected $fillable = array('order_with_login','order_cancel_possibility','order_return_possibility','status');

   

}









