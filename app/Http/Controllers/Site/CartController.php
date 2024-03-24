<?php

namespace App\Http\Controllers\Site;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;

class CartController extends Controller
{
    public function getCart()
    {
        $items= [];
        $cart = Cart::getContent();
        foreach(\Cart::getContent() as $product){
            array_push($items,$product->id);
        }
        $products = Product::whereIn('id',$items)->get();
        return view('site.pages.cart',compact('products','cart'));
    }

    public function removeItem($id)
    {
        Cart::remove($id);
        $items= [];
        foreach(\Cart::getContent() as $product){
            array_push($items,$product);
        }
        return $items;
    }
    public function updateItem($id,Request $request)
    {
        $product = Product::where('id',$id)->first();
        if($product->quantity >= $request->quantity){
            Cart::update($id,['quantity' => ['relative' => false,'value' => $request->quantity]]);
            return response()->json(['status'=>true],200);
        }else{
            return response()->json(['status'=>false,'quantity'=>$product->quantity],200);
        }
        
    }

    public function showCart(){
        $items= [];
        foreach(\Cart::getContent() as $product){
            array_push($items,$product->id);
        }
        $products = Product::whereIn('id',$items)->get();
        return response()->json(['products'=>$products,'total'=>Cart::getTotal()],200);
    }
    public function clearCart()
    {
        Cart::clear();
        return redirect('/');
    }
    public function coupons(){
        $coupons = Coupon::all();
        return $coupons;
    }

}

