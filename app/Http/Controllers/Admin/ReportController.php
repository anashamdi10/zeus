<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use App\Models\Country;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\OrderRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;
use DB;

class ReportController extends Controller
{
    public function shortage(Request $request){
        if ($request->ajax()) {
            $data = Product::select('id','name_ar','quantity')->where('quantity',0)->get();
            return DataTables::of($data)->addIndexColumn()
            ->make(true);
        }

        return view('users');
    }
    
     public function mostSales(Request $request){
        if ($request->ajax()) {
           $data= Product::select('id','name_ar')->withSum('orders', 'quantity')->whereHas('orders')->get();
           return DataTables::of($data)->addIndexColumn()
           ->make(true);
        }

        return view('users');
    }
    
    public function sales(Request $request){
        if ($request->ajax()) {
            $data= Order::select('id','order_number','total')->where('paid','1')->get();
            return DataTables::of($data)->addIndexColumn()
            ->make(true);
        }

        return view('users');
    }
    
    public function mostOrders(Request $request){
       if ($request->ajax()) {
           $data= User::select('id','name','phone')->withCount('orders')->whereHas('orders')->get();
           return DataTables::of($data)->addIndexColumn()
           ->make(true);
        }

        return view('users'); 
    }

    public function create()
    {
        
    }

    public function store(OrderRequest $request)
    {
        
    }

    public function edit($id)
    {
        
    }


    public function update(OrderRequest $request,$id)
    {
        
    }


    public function destroy($id){

       
    }

    public function show($id){
        $info = ProductReview::find($id);
        return view('admin.product-review.show',compact('info'));
    }
    
    
     public function status(Request $request)
    {
        // dd($request->all());
        $ad=ProductReview::where('id',$request->product_id)->first();
        $ad->update(['status'=>$request->status]);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
}
