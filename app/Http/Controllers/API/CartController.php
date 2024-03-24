<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PARENT_API;
use App\Models\Product;
use App\Models\Setting;


class CartController extends PARENT_API
{


     public function cartProducts(Request $request){
         $totalPrice = 0;
         $setting = Setting::find(1);
         $data = $request->all();
        $local = app()->getLocale();
        $products_str = $request->products;
        $ids=json_decode($products_str, true);
        $products =Product::select('id','name_'.$local.' as title','description_'.$local.' as desc','price','sale_price','quantity')->whereIn('id',$ids)->get();
        foreach($products as $product){
            if($product->sale_price == null){
             $totalPrice += $product->price;
            }
            else{
                $totalPrice += $product->sale_price;
            }
        }
         if($products->count()>0){
            return response()->json(['success'=>'true','data'=>$products,'totalPrice'=>$totalPrice,'tax'=>$setting->tax,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }

}
