<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\dashboard\CityRequest;
use DataTables;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class CityController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = City::select('id','name','shipping_cost')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn ='<div class="d-flex align-items-center flex-wrap gap-3"><a href="city/'.$row->id.'/edit" data-id="'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row->id.'">
                          Edit Shipping Cost
                        </button>';
                    $btn = $btn.'<form action="'.route('cities.destroy',$row->id).'" method="POST">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        >Delete</button>
                    </form>
                    </div>
                ';
                $btn = $btn.'
                <!-- Button trigger modal -->
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal'.$row->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="' . route('shipping.cost.update', $row->id) .'" method="post">
                              '.csrf_field().'
                              '.method_field("PUT").'
                              <div class="modal-body">
                                <input class="form-control" type="number" name="shipping_cost" value="'.$row->shipping_cost.'">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                              </form>
                            </div>
                          </div>
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
        $countries = Country::select('id','name')->get();
        return view('admin.city.create',compact('countries'));
    }

    public function store(CityRequest $request)
    {
        $data=$request->all();
        $create = City::create($data);

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }

    public function edit($id)
    {
        $info = City::find($id);
        $countries = Country::select('id','name')->get();
        return view('admin.city.edit',compact('info','countries'));
    }


    public function update(CityRequest $request,$id)
    {
        $data=$request->all();

        City::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    public function destroy($id){

        City::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
    
    public function updateShippingCost(Request $request,$id)
    {
         $data=$request->all();
        $city=City::find($id);
        $city->update([
            'shipping_cost'=> $request->shipping_cost
            ]);
       
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
}
