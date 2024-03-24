<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PARENT_API;
use App\Models\Coupon;


class CouponController extends PARENT_API
{

    public function index(){
        $coupones = Coupon::select('id','code','type','amount','end_time')->get();
        return response()->json(['coupones'=>$coupones,'success'=>true],200);
    }
    
    
    
    
    
}
