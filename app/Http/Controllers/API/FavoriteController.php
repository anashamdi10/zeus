<?php

namespace App\Http\Controllers\API;


use App\Models\Brand;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;

class FavoriteController extends BaseController
{

    public function myFavoutite(){
        $local=app()->getLocale();
        $favorites=Favorite::where('user_id',auth()->id())->pluck('product_id');
        $products = Product::whereIn('id',$favorites)->select('id', 'name_'.$local.' as title','description_'.$local.' as desc','price','sale_price','quantity')->get();
        return response()->json(['favorites'=>$products,'success'=>true],200);
    }


    
     public function updateFavourite(Request $request){
         
         $validator = Validator::make($request->all(), [
            'product_id'=> 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
         
         
        $product_id = $request->product_id;
        $fav = Favorite::where(['product_id'=>$product_id,'user_id'=>auth()->user()->id])->first();
        if($fav){
            $fav->delete();
           return response()->json(['message'=>'success in deleteing data','favourite'=>false]);
        }else{
            $favourite = new Favorite();
            $favourite->user_id = auth()->user()->id;
            $favourite->product_id = $product_id;
            $favourite->save();
            return response()->json(['message'=>'success in making favorite','favourite'=>true]);
        }
    }

}
