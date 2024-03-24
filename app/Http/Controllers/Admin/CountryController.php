<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\CountryRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class CountryController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Country::select('id','name')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn ='<div class="d-flex align-items-center gap-3 flex-wrap"><a href="country/'.$row->id.'/edit" data-id="'.$row->id.'" class="btn btn-primary btn-sm" role="button">Edit</a>';
                    $btn = $btn.'<form action="'.route('countries.destroy',$row->id).'" method="POST">
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
        return view('admin.country.create');
    }

    public function store(CountryRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/countries');
        }
        $create = Country::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }

    public function edit($id)
    {
        $info = Country::find($id);
        return view('admin.country.edit',compact('info'));
    }


    public function update(CountryRequest $request,$id)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {


            $sub = Country::select('image as img')->where('id',$id)->first();
            
            $file_path = storage_path().'/app/public/countries/'.$sub['img'];
            unlink($file_path); //delete from storage
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/countries');
        }
        Country::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }


    public function destroy($id){

        Country::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
}
