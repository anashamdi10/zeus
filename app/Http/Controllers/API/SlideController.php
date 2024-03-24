<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PARENT_API;
use App\Models\Slide;

class SlideController extends PARENT_API
{

    public function index()
    {
        $slides = Slide::select('id','name','image')->get();
        if($slides->count()>0){
            return response()->json(['success'=>'true','data'=>$slides,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }
    
    
    

}
