<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Controllers\IMAGE_CONTROLLER;
use App\Http\Requests\dashboard\UserRequest;
use Session;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = User::select('id','name')->get();
            return DataTables::of($data)->addIndexColumn()
                ->make(true);
        }

        return view('users');
    }


    public function create()
    {
        $countries = Country::all();
        return view('admin.user.create',compact('countries'));
    }

    public function store(UserRequest $request)
    {
        $data=$request->all();
        $data['password']=Hash::make($request->password);

        $create = User::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }
//
    
}
