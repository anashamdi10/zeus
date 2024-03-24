<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\CategoryRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class PosController extends Controller
{
   

    public function index()
    {
        return view('admin.pos.index');
    }

    public function store(CategoryRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/categories');
        }
        $create = Category::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }

}
