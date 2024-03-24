<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PARENT_API;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;

class CategoryController extends PARENT_API
{

    public function index(Request $request)
    {
        $local=app()->getLocale();
        $cats = Category::query();
        if($request->filled('name')){
            $cats = $cats->where('name_'.$local.'','like','%'. $request->name .'%');
        }

        $cats = $cats->select('id','name_'.$local.' as title','image')->where('parent_id',null)->orderBy('sort') ->get();

        if($cats->count()>0){
            return response()->json(['success'=>'true','data'=>$cats,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }
    
    
     public function categoryProducts(Request $request,$id){
         $local=app()->getLocale();

        $products = Product::select('id','name_'.$local.' as title','description_'.$local.' as desc','price','sale_price','quantity')->whereHas('productcategories', function($q) use ($id) {
            $q->where('category_id',$id);
        })
            
            ->get();
        if($products->count()>0){
            return response()->json(['success'=>'true','data'=>$products,'message'=>'success in geting data'],200);
        }else{
            return response()->json(['success'=>'true','data'=>[],'message'=>'faild in geting data'],200);
        }
    }
    
    
}
