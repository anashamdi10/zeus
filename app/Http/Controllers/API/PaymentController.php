<?php

namespace App\Http\Controllers\API;


use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Auth;

class PaymentController extends BaseController
{
    public function index()
    {
        $payments = PaymentMethod::select('id','payment_name','available','gateway')->get();
        return response()->json(['success'=>'true','data'=>$payments,'message'=>'success'],200);
    }
}