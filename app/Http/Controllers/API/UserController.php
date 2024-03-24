<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\PARENT_API;

class UserController extends PARENT_API
{
     public function users(){
        $users = User::select('id','name','phone')->get();
        $customers=[];

        foreach($users as $user){
            $customer = $user->name.' ('.$user->phone.')';
            array_push($customers,["id"=> $user->id, "text" => $customer]);
        }
        if($users->count()>0){
            return response()->json($customers);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }
    
   
}
