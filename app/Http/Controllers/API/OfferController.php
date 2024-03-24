<?php

namespace App\Http\Controllers\API;


use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;

class OfferController extends BaseController
{

    public function index(){
        $local=app()->getLocale();
        $products = Product::where('sale_price','!=',null)->select('id', 'name_'.$local.' as title','description_'.$local.' as desc','price','sale_price','quantity')->get();
        return response()->json(['products'=>$products,'success'=>"true"],200);
    }

}
