<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\our_news;
use App\Http\Requests\dashboard\NewsRequest;
use Session;
use Illuminate\Http\Request;

class OurNewsController extends Controller
{
    public function index (){
        $data = our_news::select("id", 'writer_en', "title_en", "pragraph_en")->get();

        return view('admin.our_news.index', compact('data'));
    }
    public function create (){

        return view('admin.our_news.create');
    }

    public function store(NewsRequest $request)
    {
        $data = $request->all();

        // save image
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        $file->move('uploads/news/', $filename);
        $data['image'] = $filename;

        $flage = our_news::create($data);

        if($flage){

            Session::flash('success', 'تمت الاضافة بنجاح');
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $info = get_cols_where_row(new our_news(), '*', array('id' => $id));

        return view('admin.our_news.edit', compact('info'));
    }

    public function update(NewsRequest $request, $id)
    {

        $data = $request->all();
        if ($request->image) {
            // save image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/news/', $filename);
            $data['image'] = $filename;


            // delete old image

            $our_news = our_news::find($id);
            $old_image = $our_news->image;
            if (file_exists('uploads/news/' . $old_image) and !empty($old_image)) {
                unlink('uploads/news/' . $old_image);
            }
        }

        $flag = our_news::find($id)->update($data);
        if ($flag) {
            Session::flash('success', 'تم تحديث بنجاح..');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        // delete old image

        $our_news = our_news::find($id);
        $old_image = $our_news->image;
        if (file_exists('uploads/news/' . $old_image) and !empty($old_image)) {
            unlink('uploads/news/' . $old_image);
        }
        $flag = delete(new our_news(), array('id' => $id));
        if ($flag) {
            Session::flash('success', 'تم الحذف بنجاح..');
        }
        return redirect()->back();
    }
}
