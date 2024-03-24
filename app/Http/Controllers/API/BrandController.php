<?php

namespace App\Http\Controllers\API;


use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;

class BrandController extends BaseController
{

    public function index(){
        $brands = Brand::select('id','logo','name')->get();
        return response()->json(['brands'=>$brands,'success'=>true],200);
    }
    
    public function brandProducts(Request $request,$id){
         $local=app()->getLocale();

        $products=Product::where('brand_id',$id)->select('id', 'name_'.$local.' as title','description_'.$local.' as desc','price','sale_price','quantity')->get();
        if($products->count()>0){
            return response()->json(['success'=>'true','data'=>$products,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }

}
