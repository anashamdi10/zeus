<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Counter;
use Session;

class CounterController extends Controller
{
    public function index(){
        
        $data = Counter::select("id", "facilities", "Porducts", "Produced_Tons_in_2023" , 'Oustees_Clients')->get();

        return view('admin.counter.index', ['data' => $data]);
    }
    public function update(Request $request , $id){
        $data = $request->all();
        $update = Counter::find($id)->update($data);

        if ($update) {
            Session::flash('success', 'تم تعديل البيانات بنجاح');
        } else {
            Session::flash('error', 'حدث خطأ ما ');
        }
        return redirect()->back();

        return view('admin.counter.index', ['data' => $data]);
    }
}
