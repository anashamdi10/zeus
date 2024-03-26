<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\AboutRequest;
use App\Models\About;
use Session;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = About::select("id", "title", "title_ar", "pragraph", "pragraph_ar", "image")->get();
        
        return view('admin.about.index' , ['data'=>$data]);
    }
    public function create()
    {
        return view('admin.about.create');
    }
    public function store(AboutRequest $request)
    {  
        $data = $request->all();
        // save image
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        $file->move('uploads/about/', $filename);
        $data['image'] = $filename;
        $create = About::create($data);
        if($create){
            Session::flash('success', 'تمت الاضافة بنجاح');
            return redirect()->back();
        }else{
            Session::flash('error', 'حدث خطأ ما ');
            return redirect()->back();
        }
    }

    public function update(Request $request,$id)
    {
        
        $data = $request->all();

        if($request->image){
            // save image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/about/', $filename);
            $data['image'] = $filename;


            // delete old image

            $about = About::find($id);
            $old_image = $about->image;
            if (file_exists('uploads/about/' . $old_image) and !empty($old_image)) {
                unlink('uploads/about/' . $old_image);
            }
        }
        
        $update = About::find($id)->update($data);
        if($update){
            Session::flash('success', 'تم تعديل البيانات بنجاح');
        }else{
            Session::flash('error', 'حدث خطأ ما ');
        }
        return redirect()->back();
    }
}
