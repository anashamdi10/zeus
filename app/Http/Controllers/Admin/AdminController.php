<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Country;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Controllers\IMAGE_CONTROLLER;
use App\Http\Requests\dashboard\AdminRequest;
use Session;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Admin::select('id','name')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="d-flex align-items-center gap-3"><a href="admin/'.$row->id.'/edit" data-id="'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn.'<form action="'.route('admins.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        >Delete</button>
                    </form>
                    </div>
                ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users');
    }


    public function create()
    {
        $roles = Role::select('id','name')->get();
        return view('admin.admin.create',compact('roles'));
    }

    public function store(AdminRequest $request)
    {
        $data=$request->all();
//        dd($data);
        $data['password']=Hash::make($request->password);

        $create = Admin::create($data);
        $create->assignRole($request->input('roles'));

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }
//
    public function edit($id)
    {
        $info = Admin::find($id);
        $userRole = Role::pluck('name','name')->toArray();
        $roles = Role::all();
        return view('admin.admin.edit',compact('info','userRole','roles'));
    }


    public function update(AdminRequest $request,$id)
    {
        
        $input = $request;
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
            $data=$input->all();
        }else{
            $data =$input->except('password');
        }
//        $data=$request->all();

        $admin=Admin::find($id);
        $admin->update($data);
        $admin->syncRoles($request->input('role'));
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    public function destroy($id){

        Admin::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }

}
