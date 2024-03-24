<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlashDeal;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\FlashDealRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class FlashDealController extends Controller
{
    public function index(){
        
        
            $data = FlashDeal::select('id','product_id', 'sale_price', 'title', 'image')->get();
            foreach ($data as $info){
                
                $info->product_name = get_field_value(new Product(), 'name_en', array('id' => $info->product_id));
            }

            return view('admin.flash-deal.index', ['data' => $data]);
        }
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.flash-deal.create',compact('products','categories'));
    }

    public function store(FlashDealRequest $request)
    {
        $data=$request->all();

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        $file->move('uploads/offers/', $filename);

        $data['image'] = $filename;


        if($request->has('product_id')){
            
            $flag =FlashDeal::create($data);
        }
        
        if($flag){

            Session::flash('success','تمت الاضافة بنجاح');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $info = FlashDeal::find($id);
        $products = Product::all();
        return view('admin.flash-deal.edit',compact('info','products'));
    }


    public function update(FlashDealRequest $request,$id)
    {
        $data=$request->all();

        if ($request->hasFile('image')) {

            // update image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/offers/', $filename);
            $data['image'] = $filename;

            // delete image 
            $info = FlashDeal::find($id);
            $oldphotoPath = $info->image;
            if (file_exists('uploads/offers/' . $oldphotoPath) and !empty($oldphotoPath)) {
                unlink('uploads/offers/' . $oldphotoPath);
            }
        }
            
        FlashDeal::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }


    public function destroy($id){
    

        $info = FlashDeal::find($id);
        $oldphotoPath = $info->image;
        if (file_exists('uploads/offers/' . $oldphotoPath) and !empty($oldphotoPath)) {
            unlink('uploads/offers/' . $oldphotoPath);
        }

        $flag = FlashDeal::find($id)->delete();

        if ($flag) {
            Session::flash('success', 'تم حذف البيانات بنجاح');
            return redirect()->back();
        } else {
            Session::flash('error', 'حدث خطأ ما');
            return redirect()->back();
        }

    }
}
