<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\editWhyShooseRequest;
use App\Models\WhyUs;
use Illuminate\Http\Request;
use Session;

class WhyController extends Controller
{
    public function index()
    {
        
        $data = WhyUs::select("id", "title", "pragraph_en")->get();

        return view('admin.why_shoose_us.index', ['data' => $data]);
    }

    public function edit($id)
    {   
        $info = get_cols_where_row(new WhyUs() , '*' , array('id'=> $id));
        
        return view('admin.why_shoose_us.edit',compact('info'));
    }
    public function update(editWhyShooseRequest $request,$id)
    {   
        
        $data=$request->all();
        if($request->image){
            // save image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/why_us/', $filename);
            $data['image'] = $filename;


            // delete old image

            $about = WhyUs::find($id);
            $old_image = $about->image;
            if (file_exists('uploads/why_us/' . $old_image) and !empty($old_image)) {
                unlink('uploads/why_us/' . $old_image);
            }
        }
        
        $flag = WhyUs::find($id)->update($data);
        if($flag){
            Session::flash('success','تم تحديث بنجاح..');

        }
        return redirect()->back();
    }

    
}
