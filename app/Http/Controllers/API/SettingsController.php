<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function contactUs(){
            $setting = Setting::where('id',1)->first();
            return response()->json([
               'data'=> [
                    'phone'   =>$setting->phone,
                    'email'   =>$setting->email,
                    'twitter'   =>$setting->twitter,
                    'instagram' =>$setting->instagram,
                    'snapchat'  =>$setting->snapchat,
                    'facebook'  =>$setting->facebook,
                    'whatsapp'  =>$setting->whatsapp,
            ],
            'success'=>true],200);
    }
}
