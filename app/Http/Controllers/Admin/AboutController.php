<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\AboutRequest;
use App\Http\Requests\dashboard\CertificatesRequest;
use App\Models\About;
use App\Models\Certificates;
use Session;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = get_cols_where_row(new About(), array('*'));
        $certificates = Certificates::select( 'id','title' , 'city' , 'image')->get();
        
        
        
        return view('admin.about.index' , ['data'=>$data , 'certificates' => $certificates]);
    }
    public function create()
    {
        return view('admin.about.create');
    }
    public function store(CertificatesRequest $request)
    {  
        $data = $request->all();
        // save image
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        $file->move('uploads/certificates/', $filename);
        $data['image'] = $filename;
        $create = Certificates::create($data);
        if($create){
            Session::flash('success', 'تمت الاضافة بنجاح');
            return redirect()->back();
        }else{
            Session::flash('error', 'حدث خطأ ما ');
            return redirect()->back();
        }
    }

    public function update(AboutRequest $request,$id)
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

            $about = About::find(1);
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

    public function certificates_edit($id)
    {
        $info = Certificates::find($id);

        return view('admin.about.certificates_edit', compact('info'));
    }
    public function certificates_update(CertificatesRequest $request, $id)
    {
        $data = $request->all();

        if ($request->image) {
            // save image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/certificates/', $filename);
            $data['image'] = $filename;


            // delete old image

            $certificates = Certificates::find($id);
            $old_image = $certificates->image;
            if (file_exists('uploads/certificates/' . $old_image) and !empty($old_image)) {
                unlink('uploads/certificates/' . $old_image);
            }
        }

        Certificates::find($id)->update($data);
        Session::flash('success', 'تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    public function delete($id)
    {

        Certificates::destroy($id);
        Session::flash('success', 'تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
}
