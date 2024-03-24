<?php

namespace App\Http\Controllers\API;


use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;

class CityController extends BaseController
{
    public function index(){
        $cities = City::all();
        return response()->json(['cities'=>$cities,'success'=>true],200);
    }
}
