<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\OrderRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class ProductReviewController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = ProductReview::select('product_reviews.id','product_reviews.rate','products.name_ar as product','users.name as user')->leftJoin('users','users.id','=','product_reviews.user_id')->leftJoin('products','products.id','=','product_reviews.product_id')->get();
            return DataTables::of($data)->addIndexColumn()
            
                ->addColumn('action', function($row){
                    $btn ='<a href="product-reviews/'.$row->id.'/show" data-id="'.$row->id.'" class="btn btn-primary btn-sm">Show</a>';
                    return $btn;


                })
                ->rawColumns(['action'])
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
