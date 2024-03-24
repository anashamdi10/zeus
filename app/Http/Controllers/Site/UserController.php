<?php

namespace App\Http\Controllers\Site;

use App\Models\Notification;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\City;
use Cart;
use Validator;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserAddress;

class UserController extends Controller
{

    public function myPoints()
    {
      $user = User::where('id',auth()->user()->id)->first();
     $orders = Order::where('user_id',auth()->user()->id)->get();
     return view('site.pages.points',compact('user','orders'));
    }
    public function myNotifications()
    {
        $notifications = Notification::where('user_id',auth()->user()->id)->get();
        return view('site.pages.notifications',compact('notifications'));
    }

    public function myFavourite()
    {
        $user = User::where('id',auth()->user()->id)->first();
        // dd(auth()->user()->id);
        $favourites = User::where('id',auth()->user()->id)->first()->favourite_products;
        // dd($favourites);
        return view('site.pages.account.favs',compact('favourites','user'));
    }
    public function myOrders()
    {
        $user = User::where('id',auth()->user()->id)->first();
        // dd(auth()->user()->id);
        $orders = User::where('id',auth()->user()->id)->first()->orders;
//         dd($orders);
        return view('site.pages.account.my-orders',compact('orders','user'));
    }

    public function showOrder($id)
    {
        $order = Order::where('id',$id)->first();
        $orders = OrderItem::where('order_id',$id)->get();
        $categories =  Category::orderByRaw('-name_ar ASC')->get()->nest();
        return view('site.pages.account.order_details', compact('orders','order','categories'));
    }
    
    public function addresses(){
        $local=app()->getLocale();
        $address = UserAddress::select('user_addresses.id','user_addresses.city_id','user_addresses.first_name','user_addresses.last_name','user_addresses.mobile','user_addresses.address','user_addresses.default','cities.name as city_name','cities.shipping_cost')->where('user_id',auth()->user()->id)->join('cities','cities.id','user_addresses.city_id')->get();
        return view('site.pages.account.addresses', compact('address'));
    }
    public function addressAjax(){
        $local=app()->getLocale();
        $address = UserAddress::select('user_addresses.id','user_addresses.city_id','user_addresses.first_name','user_addresses.last_name','user_addresses.mobile','user_addresses.address','user_addresses.default','cities.name as city_name','cities.shipping_cost')->where('user_id',auth()->user()->id)->join('cities','cities.id','user_addresses.city_id')->get();
        return $address;
    }
    public function createAddress(){
        $cities = City::all();
        return view('site.pages.account.add-address',compact('cities'));
    }
    public function storeAddress(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'city_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        
        $data = $request->all();
        ($request->has('default')) ? $data['default']="1" : $data['default']="0"; 
        $data['user_id'] = auth()->user()->id;
        $address = UserAddress::create($data);
        \Session::flash('success','تم تعديل البياتات بنجاح');
        return redirect()->back();
    }
    
    public function EditAddress($id){
        $address = UserAddress::where('id',$id)->first();
        $address->update(['default'=>1]);
        \Session::flash('success','تم تعديل البياتات بنجاح');
        return redirect()->back();
    }
    
    public function DeleteAddress($id){
        $address = UserAddress::destroy($id);
        \Session::flash('success','تم تعديل البياتات بنجاح');
        return redirect()->back();
    }
    
     public function accountDelete(Request $request)
    {
        $user = User::where('id',auth()->user()->id)->first()->delete();
        return redirect(route('login'));
        
    }
    
    public function getOrderProducts($id)
    {
        $products = OrderItem::where('order_id',$id)->get();

        return $products;
    }
    
    public function cancelOrder(Request $request,$id)
    {
        $order=Order::where('id',$id)->first();
        $order->update([
            'status'=> 'canceled'
            ]);
            return $order;
    }
    
    public function returnOrder(Request $request,$id)
    {
        $order=Order::where('id',$id)->first();
        $order->update([
            'status'=> 'return'
            ]);
            return $order;
    }
    
    
}
