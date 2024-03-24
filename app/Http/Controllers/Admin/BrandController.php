<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\BrandRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class BrandController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Brand::select('id','name')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn ='<div class="d-flex align-items-center flex-wrap gap-3"><a href="brand/'.$row->id.'/edit" data-id="'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn.'<form action="'.route('brands.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        >Delete</button>
                    </form>
                    </div>
                ';
                    return $btn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users');
    }

    public function create()
    {

        return view('admin.brand.create');
    }

    public function store(BrandRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = IMAGE_CONTROLLER::upload_single($request->logo,storage_path().'/app/public/brands');
        }
        $create = Brand::create($data);
        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }

    public function edit($id)
    {
        $info = Brand::find($id);
        return view('admin.brand.edit',compact('info'));
    }


    public function update(BrandRequest $request,$id)
    {
        $data=$request->all();
        
        $brand =Brand::find($id);
        if ($request->hasFile('logo')) {
            $data['logo'] = IMAGE_CONTROLLER::upload_single($request->logo,storage_path().'/app/public/brands');
        }
        
        Brand::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    public function destroy($id){
        $sub = Brand::select('logo as img')->where('id',$id)->first();
        $file_path = storage_path().'/app/public/brands/'.$sub['img'];
        unlink($file_path); //delete from storage
        Brand::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
}
