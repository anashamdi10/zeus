<?php

namespace App\Http\Controllers\Site;

use App\Models\Favorite;
use App\Models\ProductCategory;
use App\Models\ProductOption;
use App\Models\OptionValue;
use App\Models\ProductReview;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Session;

class ProductController extends Controller
{
    public function show($id)
    {   
        $product = Product::find($id);
        $options = ProductOption::where('product_id',$id)->get();
        $products = ProductCategory::where('product_id',$id)->first()->category->products->take(8);
        return view('site.pages.product', compact('product','products','options'));
    }
    
    
    public function simillarAjax($id){
        $products = ProductCategory::where('product_id',$id)->first()->category->products->take(8);
        return $products;
    }



    public function latest()
    {
        $products = Product::where('available',1)->paginate(20);
        return view('site.pages.latest_products', compact('products'));
    }


    public function addToCart(Request $request)
    {
        $product = Product::where('id',$request->productId)->firstOrFail();
        $attributes = [];
        $attributes['image'] = $product->image;
        if($request->has('options')){
            $options = OptionValue::select('option_values.name_ar as name','option_values.id','option_values.option_id','options.name_ar as optionName')->join('options','options.id','option_values.option_id')->whereIn('option_values.id',$request->options)->get();
            foreach($options as $option){
                $attributes[$option->id] = $option->name;
            }
        }
        if(Cart::has($request->productId)){
            $status = false;
            $message = 'هذا المنتج تم اضافته من قبل';
        }else{
            $status = true;
            if($product->sale_price != null){
                $price= $product->sale_price;
            }else{
                $price = $product->price;
            }
            Cart::add($product->id, $product->name_en,$price,1,$attributes);
            $message = 'تم اضافة المنتج بنجاح';
        }
        $items= [];
        foreach(\Cart::getContent() as $product){
            array_push($items,$product);
        }
        $products = \Cart::getContent()->toArray();
        return response()->json(['status' => $status,'products'=>$items,'message'=>$message,'total'=>Cart::getTotal()],200);
    }
    
    
    public function search(Request $request)
    {
        $products=Product::select('*')->where('available',1)->where('name_ar','like','%'.$request->q."%")->orWhere('name_en','like','%'.$request->q."%")->paginate(10);
        return view('site.pages.search',compact('products'));
    }

    public function toggle_like($id)
    {
        $is_like=Favorite::where('user_id',auth()->user()->id)->where('product_id',$id)->first();
        if (is_null($is_like)){
            $this->_DoLike($id);
            $message=true;
        }else{
            $this->_UnLike($id);
            $message=false;
        }
        return response()->json(['like' => $message],200);
    }

    public function _DoLike($id)
    {
        $like=new Favorite();
        $like->user_id=auth()->user()->id;
        $like->product_id=$id;
        $like->save();

        return true;

    }

    public function _UnLike($id)
    {
        $like=Favorite::where('user_id',auth()->user()->id)->where('product_id',$id)->first();
        $like->delete();
        return true;
    }

    public function mostSellerProducts(){
        $products =Product::whereHas('categories')->where('available',true)->get();
        $products = $products->sortByDesc(function ($product) {
            return $product->orders->sum('quantity');
        });
        return view('site.pages.featuredormostsellerproducts',compact('products'));
    }

    public function featuredProducts(){
        $products =  Product::whereHas('categories')->where('featured',true)->where('available',true)->get();
        return view('site.pages.featuredormostsellerproducts',compact('products'));
    }
    
    public function saleProducts(){
        $products =  Product::where('sale_price','!=',null)->where('available',1)->paginate(12);
        return view('site.pages.sales',compact('products'));
    }
    
    
    public function postRate(Request $request){
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $rate = ProductReview::create($data);
        return redirect()->back();
    }



}
