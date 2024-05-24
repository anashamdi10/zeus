<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilities;
use Session;

use App\Http\Requests\dashboard\facilitiesRequest;

class FacilitiesController extends Controller
{
    public function index()
    {
    
        $data = Facilities::select("id", "title", "pragraph")->get();

        return view('admin.facilities.index',['data'=>$data]);
    }
    public function create()
    {

        return view('admin.facilities.create');
    }
    public function store(facilitiesRequest  $request)
    {
        
        $data = $request->all();
        // save image
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        $file->move('uploads/facilities/', $filename);
        $data['image'] = $filename;
        
        $create = Facilities::create($data);
        if ($create) {
            Session::flash('success', 'تمت الاضافة بنجاح');
            return redirect()->back();
        } else {
            Session::flash('error', 'حدث خطأ ما ');
            return redirect()->back();
        }
    }


    public function facilities_edit($id)
    {

        $info = Facilities::find($id);

        return view('admin.facilities.edit', ['info' => $info]);
    }
    public function facilities_update(facilitiesRequest  $request ,$id)
    {

        $data = $request->all();

        if ($request->image) {
            // save image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/facilities/', $filename);
            $data['image'] = $filename;


            // delete old image

            $certificates = Facilities::find($id);
            $old_image = $certificates->image;
            if (file_exists('uploads/facilities/' . $old_image) and !empty($old_image)) {
                unlink('uploads/facilities/' . $old_image);
            }
        }

        Facilities::find($id)->update($data);
        Session::flash('success', 'تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    
}
