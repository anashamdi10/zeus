<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\CategoryRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class CategoryController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Category::select('id', 'name_en')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn ='<div class="d-flex align-items-center flex-wrap gap-3"><a href="category/'.$row->id.'/edit" data-id="'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn.'<form action="'.route('categories.destroy',$row->id).'" method="POST">
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
        $categories = Category::select('id', 'name_en')->get();
        return view('admin.category.create',compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/categories');
        }
        $create = Category::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }

    public function edit($id)
    {
        $info = Category::find($id);
        $categories = Category::select('id','name_ar')->get();
        return view('admin.category.edit',compact('info','categories'));
    }


    public function update(CategoryRequest $request,$id)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {


            $sub = Category::select('image as img')->where('id',$id)->first();
            $file_path = storage_path().'/app/public/categories/'.$sub['img'];
            unlink($file_path); //delete from storage
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/categories');
        }
        Category::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }


    public function destroy($id){
        Category::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
}
