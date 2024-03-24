<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use Session;
use App\Http\Controllers\IMAGE_CONTROLLER;

class AuthController extends BaseController
{

    public function signin(Request $request)
    {
        
         $request->validate([
            'phone' => 'required|string|exists:users,phone',
            'password' => 'required|string',
        ]);
        
        $data = $request->all();
        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['token'] = $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] = $authUser->name;
            return response()->json(['success'=>'true','data'=>$authUser,'token'=>$authUser->createToken('MyAuthApp')->plainTextToken,'message'=>'User signed in'],200);
        } else {
            return response()->json(['success'=>'false','message'=>'البيانات خاطئة'],200);
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required|unique:users',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError(['Error validation', $validator->errors()],200);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] = $user->name;
        
         return response()->json(['success'=>'true','data'=>$user,'token'=>$user->createToken('MyAuthApp')->plainTextToken,'message'=>'User created successfully.'],200);

    }
    
    public function verifyCode(Request $request){
         $data = $request->validate([
            'phone' => 'required|exists:users,phone',
        ]);
        $user=User::where('phone',$data['phone'])->where('id',auth()->user()->id)->first();

        if(!$user)
        {
            return response()->json([
                'message'=>'errors',
                'errors' => ["error" => "هناك خطأ في الدخول"]
            ], 200);
        }
        if($user->status==1)
        {
            return response()->json([
                'message'=>'errors',
                'errors' => ["error" => 'already verified']
            ], 200);
        }else{
            $user->update(['status'=>1]);
            return response()->json(['status'=>true,'message' => 'success','user'=>$user], 200);
        }
    }
    

    
    // public function getCode(Request $request)
    // {
    //     $user = User::where('phone', $request->phone)->first();
    //     if ($user) {
    //         $forget_code = random_int(1000, 9999);
    //         $user->code = $forget_code;
    //         $user->save();
    //         return $this->sendSms($user->code);
            
    //     }
    // }
    
    // public function sendSms($code){
    //   $user = User::where('code', $code)->first();
    //     $phone = $user->phone;
    //     $key = $user->country->code;
    //     $username = 's7sa';
    //     $password = 'Mm123456*';
    //     $msisdn = $key.$phone;
    //     $sid = 'THEPLANET';
    //     $message="Yor code is " .$code;
    //     $fl = '0';
    //     $url = "https://apps.gateway.sa/vendorsms/pushsms.aspx";
    //     $stringToPost = "username=".$username."&password=".$password."&msisdn=".$msisdn."&sid=".$sid."&message=".$message."&fl=".$fl;
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_HEADER, 0);
    //     curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $stringToPost);
    //     $result = curl_exec($ch);
    //     if($result){
            
    //       return response()->json([
    //             'status' => true,
    //             'message' => trans('تم ارسال رقم التفعيل '),
    //              'code' => $code,
    //         ]);
    //     }else{
    //          return response()->json([
    //             'status' => false,
    //             'message' => [trans(' البريد الالكتروني او الهاتف غير مسجل ')]
    //         ]);
    //     }
    // }
    
    
    
    public function checkCode(Request $request){
        $user = User::where(['phone'=>$request->phone,'code'=>$request->code])->first();
         $token = $user->createToken('MyAuthApp')->plainTextToken;
        if($user){
           return response()->json([
                'status' => true,
                'user' => $user,
                'token'=>$token
            ]);
        }else{
             return response()->json([
                'status' => false,
                'message' => [trans(' لا يوجد مستخدم يهذه البيانات ')]
            ]);
        }
    }
    

     public function editPassword(Request $request)
    {
        $messages = [
            'password.required' => "كلمه المرور  مطلوبه",

        ];
        $validator = validator()->make($request->all(), [

            'password' => 'required',

        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $error_data = [];
            foreach ($errors->all() as $error) {
                array_push($error_data, $error);
            }
            $data = $error_data;
            $response = [
                'status' => false,
                'error' => $data
            ];
            return response()->json($response);
        }
        $row = User::where('id', auth()->user()->id)->first();

        $row->password = bcrypt($request->password);
        $row->save();
        return response()->json([
            'status' => true,
            'message' => trans('تم تغيير كلمه المرور'),

        ]);
    }

    
    
    
    
     public function resetPassword(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'email' => 'required|email',
            'code' => 'required',
            'password' => 'required',
        ]);
        if ($validation->fails()) {
            $errors = $validation->errors();
            $error_data = [];
            foreach ($errors->all() as $error) {
                array_push($error_data, $error);
            }
            $data = $error_data;
            $response = [
                'status' => false,
                'error' => $data,
            ];
            return response()->json($response);
        }
        $user = User::where('email', $request->email)->where('code', $request->code)->first();
        if ($user) {
            $password = $request->password;
            $user->password = bcrypt($password);
            $user->forget_code = null;
            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'تم تغيير كلمة المرور'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'تأكد من الكود والبريد الالكتروني'
            ], 200);
        }
    }
    
      public function editProfile(Request $request)
    {
        $data=$request->all();
        if($data['password'] == null){
            $data=$request->except(['password']);
        }else{
            $data=$request->all();
             $data['password'] = bcrypt($data['password']);
        }
        
        if ($request->hasFile('image')) {


            $sub = User::select('image as img')->where('id',auth()->user()->id)->first();
            $file_path = storage_path().'/app/public/user/'.$sub['img'];
            if($sub['img']){
                unlink($file_path); //delete from storage
            }
            $data['image'] = IMAGE_CONTROLLER::upload_single($request->image,storage_path().'/app/public/user');
        }
       
        User::where('id',auth()->user()->id)->update($data);
       $user= User::where('id',auth()->user()->id)->first();
        return response()->json([
            'user' => $user,
            'status' => true,
            'message' => trans('تم التعديل علي حسابك الشخصي  '),

        ]);
    }
    
    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return[
            'status' => true,
        ];
    }
    
    public function delete(Request $request){
        auth()->user()->tokens()->delete();
        $user = User::destroy(auth()->user()->id);
        return[
            'status' => true,
        ];
    }



}