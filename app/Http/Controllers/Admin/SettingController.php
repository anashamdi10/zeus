<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Setting;
use App\Models\SubCategory;
use App\Models\Contact;
use App\Models\StoreSetting;
use App\Models\PaymentMethod;
use App\Models\PaymentMethodSetting;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\SettingRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class SettingController extends Controller
{
    
    public function contacts(Request $request){
        // if ($request->ajax()) {
        //     $data = Contact::select('id','name','message')->get();
        //     return DataTables::of($data)->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $btn ='<form action="'.route('contact.destroy',$row->id).'" method="POST">
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
        // }


        $data = Contact::select('id', 'name', 'email', 'message')->get();
        
        return view('admin.setting.contacts', ['data' => $data]);
    }


    public function editContact()
    {
        $info = Setting::find(1);
        return view('admin.setting.contact',compact('info'));
    }


    public function updateContact(SettingRequest $request)
    {
        $data=$request->all();
        Setting::find(1)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
    
    public function edit()
    {
         $info = Setting::find(1);
        return view('admin.setting.index',compact('info'));
    }

   public function update(Request $request)
    {
        $data=$request->all();
        if ($request->hasFile('logo')) {

            $sub = Setting::select('logo as img')->where('id',1)->first();
            $file_path = storage_path().'/app/public/settings/'.$sub['img'];
            if($sub['img']){
                unlink($file_path); //delete from storage
            }
            $data['logo'] = IMAGE_CONTROLLER::upload_single($request->logo,storage_path().'/app/public/settings');
        }
        Setting::find(1)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
    
    public function destroyContact($id){

        Contact::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
    
    
    public function editStoreSetting()
    {
        $info = StoreSetting::find(1);
        return view('admin.setting.edit-store-setting',compact('info'));
        
    }
    
    public function updateStoreSetting(Request $request)
    {
        $info = StoreSetting::find(1);

        
        $info->order_with_login = $request->input('order_with_login', "false");
        $info->order_return_possibility = $request->input('order_return_possibility', "false");
         $info->order_cancel_possibility = $request->input('order_cancel_possibility', "false");
        
        if(isset($request->order_cancel_possibility)){
            $info->order_cancel_possibility ="true";
            $info->status = $request->input('status');
        }else{
            $info->order_cancel_possibility ="false";
             $info->status = null;
        }
        $info->save();
        return redirect()->back();
    }
    
    
   public function paymentMethods(Request $request)
   {
       if ($request->ajax()) {
            $data = PaymentMethod::select('id','payment_name')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn ='<div class="d-flex align-items-center flex-wrap gap-3"><a href="setting/'.$row->id.'/payment/edit" data-id="'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn.'<form action="'.route('setting.payment.destroy',$row->id).'" method="POST">
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
   
   
   public function createPayment(Request $request)
   {
        return view('admin.setting.create-payment-method');
   }
    
     public function storePayment(Request $request)
   {
       $data = $request->all();
       if ($request->hasFile('image')) {
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/payments');
        }
        $create =PaymentMethod::create($data);
        PaymentMethodSetting::create([
            'domain' => $request->domain,
            'payment_method_id' => $create->id,
            'type' => $request->type,
            'marchent_id' => $request->marchent_id,
            'secret_key' => $request->secret_key, 
            'token' => $request->token,
            ]);
            
        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
        
   }
    
    
    
    public function editPaymentSetting($id)
    {
         $info = PaymentMethod::find($id);
        return view('admin.setting.edit-payment-setting',compact('info'));
    }
    
    public function updatePaymentSetting(Request $request,$id)
    {
        $data = $request->all();
        $info = PaymentMethod::find($id);
        if ($request->hasFile('image')) {

            $sub = PaymentMethod::select('image as img')->where('id',$id)->first();
            if($sub['img']){
               $file_path = storage_path().'/app/public/payments/'.$sub['img'];
               unlink($file_path); //delete from storage
            };
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/payments');
        }

        $info->update($data);
        $setting=PaymentMethodSetting::where('payment_method_id',$id)->first();
        $setting->update([
            'domain' => $request->domain,
            'payment_method_id' => $id,
            'type' => $request->type,
            'marchent_id' => $request->marchent_id,
            'secret_key' => $request->secret_key,
            'token' => $request->token,
            ]);
            
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }
    
   public function destroy($id){
        $sub = PaymentMethod::select('image as img')->where('id',$id)->first();
        if($sub['img']){
            $file_path = storage_path().'/app/public/payments/'.$sub['img'];
            unlink($file_path); //delete from storage
        };
        
        PaymentMethod::destroy($id);
        PaymentMethodSetting::where('payment_method_id',$id)->first()->delete();
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }

}
