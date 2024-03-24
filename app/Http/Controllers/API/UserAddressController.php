<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use App\Models\UserAddress;
use Session;

class UserAddressController extends BaseController
{
    public function addresses(){
        $local=app()->getLocale();
        $address = UserAddress::select('user_addresses.id','user_addresses.city_id','user_addresses.first_name','user_addresses.last_name','user_addresses.mobile','user_addresses.address','user_addresses.default','cities.name as city_name','cities.shipping_cost')->where('user_id',auth()->user()->id)->join('cities','cities.id','user_addresses.city_id')->get();
        return response()->json(['success'=>'true','data'=>$address,'message'=>'success in geting data'],200);
    }
    
    public function storeAddress(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'city_id' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError(['Error validation', $validator->errors()],200);
        }
        
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $address = UserAddress::create($data);
        return response()->json(['success'=>'true','data'=>$address,'message'=>'تم اضافة العنوان'],200);
    }
    
    public function EditAddress($id){
        $address = UserAddress::where('id',$id)->first();
        $address->update(['default'=>1]);
        return response()->json(['success'=>'true','data'=>$address,'message'=>'تم تعديل العنوان'],200);
    }
    
    public function DeleteAddress($id){
        $address = UserAddress::destroy($id);
        return response()->json(['success'=>'true','message'=>'تم مسح العنوان'],200);
    }
    
}