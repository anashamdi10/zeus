<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Session;
class ReviewController extends Controller
{
    public function index()
    {
        $data = Review::select('id', 'name', 'opinion', 'work', 'image')->get();
        return view('admin.review.index', ['data' => $data]);
    }
    public function create()
    {
        
        return view('admin.review.create');
    }
    public function Store(Request $request)
    {

        $request->validate([
            'name'            => ['required'],
            'opinion'         => ['required'],
            'work'            => ['required'],
            'image'           => ['required', 'mimes:jpeg,bmp,png,gif,jpg,webp','max:5000'],

        ]);



        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        $file->move('uploads/review/', $filename);


        $data['name'] = $request->name;
        $data['image'] = $filename;
        $data['opinion'] = $request->opinion;
        $data['work'] = $request->work;
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = null;

        

        $finish = Review::create($data);
        if ($finish) {
            
            return redirect()->route('admin.review')->with(['errors' => 'review Complete']);
        }

    }

    public function edit($id)
    {
        $info = Review::find($id);


        return view('admin.review.edit', compact('info'));
    }

        public function update(Request $request, $id){
        
            $request->validate([
            'name'            => ['required'],
            'opinion'         => ['required'],
            'work'            => ['required'],
            'image'           => ['required', 'mimes:jpeg,bmp,png,gif,jpg,webp', 'max:5000'],

        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {

            // update image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/review/', $filename);
            $data['image'] = $filename;

            // delete image 
            $info = Review::find($id);
            $oldphotoPath = $info->image;
            if (file_exists('uploads/review/' . $oldphotoPath) and !empty($oldphotoPath)) {
                unlink('uploads/review/' . $oldphotoPath);
            }
        }

        Review::find($id)->update($data);
        Session::flash('success', 'تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
    public function delete($id)
    {
        $info = Review::find($id);
        $oldphotoPath = $info->image;
        if (file_exists('uploads/review/' . $oldphotoPath) and !empty($oldphotoPath)) {
            unlink('uploads/review/' . $oldphotoPath);
        }

        $flag = Review::find($id)->delete();

        if($flag){
            Session::flash('success', 'تم حذف البيانات بنجاح');
            return redirect()->back();
        }else{
            Session::flash('error', 'حدث خطأ ما');
            return redirect()->back();
        }

    }

}
