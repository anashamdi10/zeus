<?php
namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\dashboard\CategoryRequest;
use App\Models\Category;
use App\Model\Ad;
use App\Model\Token;
use App\Models\User;
use App\Model\City;
use App\Models\Country;
use Session;
use Validator;
use Auth;
use JWTAuth;
use Redirect;
use App\Http\Resources\AdCollection;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function username(){
        return 'phone';
    }
    public function code()
    {
        if(auth()->user()->active == 0){
            return view('auth.code');
        }else{
            return redirect(route('index.show'));
        }
        
    }
    public function login_mobile()
    {
        $countries = Country::all();
        return view('auth.login', compact('countries'));
    }
    public function register()
    {
        $countries = Country::all();
        return view('auth.register', compact('countries'));
    }
    public function signin(Request $request)
    {
       
        $ss=Auth::attempt(array('phone' => $request->phone, 'password' => $request->password,'country_id' => $request->country_id), $request->remember);
        
        if(auth()->user()){
              return redirect(route('index.show'));
        }
        else{
                 Session::flash('danger','بيانات الدخول غير صحيحه');
                    return redirect(route('login'));
            }
        
        
        
    }
    public function logout(Request $request){
        Auth::logout();
        return Redirect::to('login'); 
    }



    public function signUp(Request $request){
        $data=$request->all();
        $validator = Validator::make($data, 
        [
            'name'=>'required|string|max:191',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|string|min:8',
            'phone'=>'required|string|max:11|unique:users,email',
        ]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }  
        $user=User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => \Hash::make($data['password']),
            'code' =>Str::random(4),
            'country_id' => $data['country_id'],
        ]);
        Auth::attempt([
            'phone' => $data['phone'],
            'password' => $data['password'],
            'country_id' => $data['country_id'],
        ],true);
        
        // return $this->sendSms($user->code);
        Session::flash('success','مشكلة فى ارسال  الكود ');
            return redirect(route('index.show'));
    }
    
    // public function sendSms($code){
    //     $phone = auth()->user()->phone;
    //     $key = auth()->user()->country->code;
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
    //         Session::flash('success','تم  ارسال  الكود على رقم الجوال ');
    //         return redirect(route('login_code'));
    //     }else{
    //         Session::flash('success','مشكلة فى ارسال  الكود ');
    //         return redirect(route('index.show'));
    //     }
    // }
    
    public function active(Request $request){
        $user = User::find(auth()->user()->id);
        if(auth()->user()->active == 0){
            $code = $request->code;
            if($code == auth()->user()->code){
                $user->update(['active'=>1,'code'=>null]);
                return response()->json(['success'=>true]);
            }else{
                return response()->json(['success'=>false,'message'=>'الكود خطأ !']);
            }
        }else{
            return redirect(route('index.show'));
        }
    }

    public function getCities($id)
    {
        $cities  = City::where("category_id",$id )->select('name', 'id')->get();

        return $cities;
    }

    public function forgetPassword()
    {

        return view('auth.forget-password');
    }
}