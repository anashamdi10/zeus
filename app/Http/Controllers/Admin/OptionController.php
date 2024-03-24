<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Country;
use App\Models\OptionValue;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\OptionRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class OptionController extends Controller
{
    public function index(Request $request){
        
        if ($request->ajax()) {
            $data = Option::select('id','name_ar')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn ='<div class="d-flex align-items-center flex-wrap gap-3"><a href="option/'.$row->id.'/edit" data-id="'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn.'<form action="'.route('options.destroy',$row->id).'" method="POST">
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
        return view('admin.option.create');
    }

    public function store(OptionRequest $request)
    {
        $data=$request->all();
        // dd($data);
        
        $create = Option::create($data);
        

        foreach ($request->name_ar_arr as $key => $value) {
            
            $destinationPath = storage_path().'/app/public/options/';
            $filename = $request->image[$key]->getClientOriginalName();
            $request->image[$key]->move($destinationPath, $filename);
           
            $create1 = OptionValue::create([
                'option_id' =>$create->id,
                'name_ar' => $value,
                'name_en' =>$request->name_en_arr[$key],
                'image' =>$filename,

            ]);
        }

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }

    public function edit($id)
    {
        $info = Option::find($id);
        return view('admin.option.edit',compact('info'));
    }


    public function update(OptionRequest $request,$id)
    {
        $data=$request->all();
        
        Option::find($id)->update($data);
        if ($request->hasFile('image')) {

            $images = OptionValue::select('image as img')->where('id',$id)->get();
            if($images){
            foreach($images as $image){
            $file_path = storage_path().'/app/public/options/'.$image['img'];
            unlink($file_path); //delete from storage
            $image->delete();
            }
            }
        }
        foreach ($request->name_ar_arr as $key => $value) {
            
            $destinationPath = storage_path().'/app/public/options/';
            $filename = $request->image[$key]->getClientOriginalName();
            $request->image[$key]->move($destinationPath, $filename);
           
            $create1 = OptionValue::create([
                'option_id' =>$id,
                'name_ar' => $value,
                'name_en' =>$request->name_en_arr[$key],
                'image' =>$filename,

            ]);
        }
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }


    public function destroy($id){
        $sub = Option::select('image as img')->where('id',$id)->first();
        $file_path = storage_path().'/app/public/categories/'.$sub['img'];
        unlink($file_path); //delete from storage
        Option::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
    
    public function getOptionAjax($id)
    {
        $options = OptionValue::select('id','name_ar')->where('option_id',$id)->get();
        return $options;
    }
}
