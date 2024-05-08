<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Our_services;
use App\Http\Requests\dashboard\ServicesRequest;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;
use Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter;
use Session;
class ServicesController extends Controller
{
    public function index()
    {
        
        $data = Our_services::select("id", "title_en", "pragraph_en")->get();

        return view('admin.our_services.index', compact('data'));
    }

    public function create(){
        return view('admin.our_services.create');
    }
    public function store(ServicesRequest $request){
        $data = $request->all();
        
        // save image
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        $file->move('uploads/services/', $filename);
        $data['image'] = $filename;

        Our_services::create($data);
        
        Session::flash('success', 'تمت الاضافة بنجاح');
        return redirect()->back();
    }

    public function delete($id)
    {
        // delete image
        $Our_services = Our_services::find($id);
        $old_image = $Our_services->image;
        if (file_exists('uploads/services/' . $old_image) and !empty($old_image)) {
            unlink('uploads/services/' . $old_image);
        }
        $flag = delete(new Our_services(), array('id' => $id));
        if ($flag) {
            Session::flash('success', 'تم الحذف بنجاح..');
        }
        return redirect()->back();
    }


    public function edit($id)
    {
        $info = get_cols_where_row(new Our_services(), '*', array('id' => $id));

        return view('admin.our_services.edit', compact('info'));
    }


    public function update(ServicesRequest $request, $id)
    {

        $data = $request->all();
        if ($request->image) {
            // save image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/services/', $filename);
            $data['image'] = $filename;


            // delete old image

            $Our_services = Our_services::find($id);
            $old_image = $Our_services->image;
            if (file_exists('uploads/services/' . $old_image) and !empty($old_image)) {
                unlink('uploads/services/' . $old_image);
            }
        }

        $flag = Our_services::find($id)->update($data);
        if ($flag) {
            Session::flash('success', 'تم تحديث بنجاح..');
        }
        return redirect()->back();
    }
}
