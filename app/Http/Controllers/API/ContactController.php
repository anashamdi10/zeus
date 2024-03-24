<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PARENT_API;
use App\Models\Contact;
use Validator;
use App\Models\ProductCategory;

class ContactController extends PARENT_API
{

    public function contact(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
          'name'=> 'required',
          'phone'=> 'required',
          'message'=> 'required',
       ]);
    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }
       $contact = Contact::create([
            'name'      =>   $request->name,
            'email'     =>  $request->phone,
            'message'   =>   $request->message

            ]);
      return response()->json(['data'=> $contact,'message'=>'success in making contact'],200);
    }
    
    
    
}