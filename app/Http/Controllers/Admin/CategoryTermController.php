<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTerm;
use App\Models\Country;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\CategoryTermRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class CategoryTermController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = CategoryTerm::select('id','content_ar')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn ='<div class="d-flex align-items-center flex-wrap gap-3"><a href="categoryterm/'.$row->id.'/edit" data-id="'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn.'<form action="'.route('categoryterms.destroy',$row->id).'" method="POST">
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
        $categories = Category::select('id','name_ar')->get();
        return view('admin.categoryterm.create',compact('categories'));
    }

    public function store(CategoryTermRequest $request)
    {
        $data=$request->all();

        $create = CategoryTerm::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }

    public function edit($id)
    {
        $info = CategoryTerm::find($id);
        $categories = Category::select('id','name_ar')->get();
        return view('admin.categoryterm.edit',compact('info','categories'));
    }


    public function update(CategoryTermRequest $request,$id)
    {
        $data=$request->all();
       CategoryTerm::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }


    public function destroy($id){

        CategoryTerm::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
}
