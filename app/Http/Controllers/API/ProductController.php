<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Models\Option;
use App\Models\Category;
use App\Models\ProductReview;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\PARENT_API;

class ProductController extends PARENT_API
{
     public function products(){
         $local=app()->getLocale();
        $products = Product::select('id','name_'.$local.' as title','description_'.$local.' as desc','price','sale_price','quantity')->whereHas('productcategories')->get();
        if($products->count()>0){
            return response()->json(['success'=>'true','data'=>$products,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }
    
    public function sales(){
         $local=app()->getLocale();
        $products = Product::select('id','name_'.$local.' as title','description_'.$local.' as desc','price','sale_price','quantity')->where('sale_price','!=',null)->whereHas('productcategories')->get();
        if($products->count()>0){
            return response()->json(['success'=>'true','data'=>$products,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }
    public function flashDeals(){
         $local=app()->getLocale();
        $products = Product::select('products.id','products.name_'.$local.' as title','products.description_'.$local.' as desc','products.price','flash_deals.sale_price','flash_deals.time','flash_deals.date','products.quantity')->join('flash_deals','flash_deals.product_id','products.id')->whereHas('flashDeals')->get();
        if($products->count()>0){
            return response()->json(['success'=>'true','data'=>$products,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }
    
    
    public function search(Request $request){
         $local=app()->getLocale();
        $products = Product::select('id','name_'.$local.' as title','description_'.$local.' as desc','price','sale_price','quantity')->where('name_ar','LIKE','%'.$request->name."%")->orwhere('name_en','LIKE','%'.$request->name."%")->whereHas('productcategories')->get();
        if($products->count()>0){
            return response()->json(['success'=>'true','data'=>$products,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $local=app()->getLocale();
         $products = Product::
                leftJoin('brands as brand','products.brand_id','brand.id')
                ->select(['products.id','products.name_'.$local.' as title','products.description_'.$local.' as desc','products.quantity','products.price','products.point','products.sale_price','brand.name as brandName'])
                ->with(['images' => function($q) use($id){$q->where('product_id',$id);},'rates' => function($t) use($id){$t->where('product_reviews.product_id',$id)->select('users.name','users.image','product_reviews.comment','product_reviews.rate','product_reviews.created_at','product_reviews.id','product_reviews.product_id','product_reviews.user_id')->join('users','users.id','product_reviews.user_id')->get();}])
                ->where('products.id',$id) ->firstOrFail();   
            
        if($products->count()>0){
            return response()->json(['success'=>'true','data'=>$products,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'false','message'=>'faild in geting data'],400);
        }
    }
    
     public function latest(){
         $local=app()->getLocale();
        $products = Product::select('id','name_'.$local.' as title','description_'.$local.' as desc','price','sale_price','quantity','brand_id')->whereHas('productcategories')->where('available',true)->orderBy('created_at','desc')->take(6)->get();
        if($products->count()>0){
            return response()->json(['success'=>'true','data'=>$products,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }
    
    
     public function moreSeller(){
         $local=app()->getLocale();
        $products = Product::select('id','name_'.$local.' as title','description_'.$local.' as desc','price','sale_price','quantity')->whereHas('productcategories')->where('available',true)->whereHas('orders')->take(6)->get();

        if($products->count()>0){
            return response()->json(['success'=>'true','data'=>$products,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }
    public function moreRate(){
         $local=app()->getLocale();
        $data = Product::select('id','name_'.$local.' as title','description_'.$local.' as desc','price','sale_price','quantity')->where('available',true)->whereHas('rates')->take(6)->get();
        $products = $data->sortByDesc(function ($product) {
            return $product->rates->sum('rate');
        });
        if($products->count()>0){
            return response()->json(['success'=>'true','data'=>$products,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }
    
    public function checkCoupon(Request $request){
        $code = $request->code;
        $coupon = Coupon::where('code',$code)->first();
        if($coupon){
            return response()->json(['success'=>'true','data'=>$coupon,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'false','data'=>$coupon,'message'=>'success in geting data'],200);
        }
    }
    
    
    public function postRate(Request $request){
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $rate = ProductReview::create($data);
        return response()->json(['success'=>'true','data'=>$rate,'message'=>'success rate'],200);
    }
    
    
}
