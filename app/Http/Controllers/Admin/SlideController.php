<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Page;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\SlideRequest;
use App\Http\Requests\dashboard\EditSlideRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use App\Models\Req;
use App\Models\Video;
use Illuminate\Support\Facades\File;
use Session;

class SlideController extends Controller
{
    public function index(Request $request){
        // if ($request->ajax()) {
        //     $data = Slide::select('id','name')->get();
        //     return DataTables::of($data)->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $btn ='<div class="d-flex align-items-center gap-3"><a href="slide/'.$row->id.'/edit" data-id="'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
        //             $btn = $btn.'<form action="'.route('slides.destroy',$row->id).'" method="POST">
        //             '.csrf_field().'
        //             '.method_field("DELETE").'
        //             <button type="submit" class="btn btn-danger btn-sm"
        //                 onclick="return confirm(\'Are You Sure Want to Delete?\')"
        //                 >Delete</button>
        //             </form>
        //             </div>
        //         ';
        //             return $btn;


        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
            $data = Slider::select("id","title", "sub_title" , "link")->get();
            $video = Video::all()->toArray();
            
            return view('admin.slide.index', ['data' =>$data , 'video'=>$video]);
        }

        // return view('users');
    

    public function create()
    {
        return view('admin.slide.create');
    }

    public function store(SlideRequest $request)
    {
        $data=$request->all();

        // //photo Save in local
        // $file = $request->file('image');
        // $extension = $file->getClientOriginalExtension(); // getting image extension
        // $filename = time() . '.' . $extension;
        // $file->move('uploads/slides/', $filename);
        // $data['image'] = $filename;

        $create = Slider::create($data);
        if($create){
            Session::flash('success','تمت الاضافة بنجاح');
        }else{
            Session::flash('errors', 'حدث خطأ ما');
        }
        return redirect()->back();
    }

    public function edit($id)
    {   
        $info = Slider::find($id);
        
        return view('admin.slide.edit',compact('info'));
    }
    public function editVideo($id)
    {   
        $info = Video::find($id);
        
        return view('admin.slide.edit_video',compact('info'));
    }
    public function createVideo()
    {

        return view('admin.slide.create_video');
    
        
    }
    public function storeVideo(Request $request )
    {

        $request->validate([
            'video' => 'required|mimes: mp4,ogx,oga,ogv,ogg,webm'
        ]);

        $file = $request->file('video');
        $file->move('uploads/video', $file->getClientOriginalName());
        $file_name = $file->getClientOriginalName();

        $insert = new Video();
        $insert->video = $file_name;
        $insert->save();
        
        Session::flash('success', 'تمت الاضافة بنجاح');


        return redirect()->back();
    
        
    }
    public function updateVideo(Request $request,$id)
    {
        

        $data = $request->all();
        $request->validate([
            'video' =>'required|mimes: mp4,ogx,oga,ogv,ogg,webm'
        ]);
        if ($request->hasFile('video')) {


            // // update image
            // $file = $request->file('video');
            // $extension = $file->getClientOriginalExtension(); // getting image extension
            // $filename = time() . '.' . $extension;
            // $file->move('uploads/slides/video', $filename);
            // $data['video'] = $filename;


            $file = $request->file('video');
            $file->move('uploads/video', $file->getClientOriginalName());
            $file_name = $file->getClientOriginalName();
            $data['video'] = $file_name;


            // delete image 
            $info = Video::find($id);
        
            $oldvideoPath = $info->video;
            if (file_exists('uploads/video/' . $oldvideoPath) and !empty($oldvideoPath)) {
                
                unlink('uploads/video/' . $oldvideoPath);
            }
        }
        Video::find($id)->update($data);
        Session::flash('success', 'تم تعديل البيانات بنجاح');
        return redirect()->back();
    }


    public function update(EditSlideRequest $request,$id)
    {
        $data=$request->all();
    
        Slider::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }


    public function destroy($id){
        $sub = Slide::select('image as img')->where('id',$id)->first();
        $file_path = storage_path().'/app/public/slides/'.$sub['img'];
        unlink($file_path); //delete from storage
        Slide::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }


    public function delete($id)
    {
        
        $flag = Slider::find($id)->delete();

        if ($flag) {
            Session::flash('success', 'تم حذف البيانات بنجاح');
            return redirect()->back();
        } else {
            Session::flash('error', 'حدث خطأ ما');
            return redirect()->back();
        }
    }
}
