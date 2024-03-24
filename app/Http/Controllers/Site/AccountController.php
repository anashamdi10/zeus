<?php

namespace App\Http\Controllers\Site;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Validator;
use App\Models\Order;
use App\Models\User;
use App\Models\Category;
use App\Models\Country;
use Redirect;


class AccountController extends Controller
{

    public function profile()
    {
        $orders = auth()->user()->orders->count();
        $ordersT = auth()->user()->orders->sum('total');
        $categories =  Category::orderByRaw('-name_ar ASC')->get();
        $countries =  Country::all();
        $cities =  City::all();
        return view('site.pages.account.edit', compact('orders','ordersT','categories','countries','cities'));
    }
    public function updateProfile(Request $request)
    {
        $data=$request->all();
        $auth=User::find(auth()->user()->id);
        $validator = Validator::make($data, [
                'name' =>   'required|string|max:255',
                'email' =>   'unique:users,email,'.$auth->id,
                'phone' =>         'required',
            ]);
        if($validator->fails()){
            return Redirect::to('/account/profile')->withErrors($validator);
        }
         $auth->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
        ]);
        \Session::flash('success','تم تعديل البياتات بنجاح');
        return redirect()->back();
    }
    public function getOrders()
    {
        $orders = auth()->user()->orders;
        $categories =  Category::orderByRaw('-name_ar ASC')->get()->nest();
        return view('site.pages.account.show', compact('orders','categories'));
    }
    public function showOrder($id)
    {
        $order = Order::where('id',$id)->first();
        $orders = OrderItem::where('order_id',$id)->get();
        return view('site.pages.account.order_details', compact('orders','order'));
    }
    public function getFavs()
    {
        $favorites=auth()->user()->favorites;
        return view('site.pages.account.favs', compact('favorites'));
    }
}
