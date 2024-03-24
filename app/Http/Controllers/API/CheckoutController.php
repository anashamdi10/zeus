<?php

namespace App\Http\Controllers\API;


use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\City;
use App\Models\OrderItem;
use App\Models\UserAddress;
use App\Models\PaymentMethod;
use App\Models\PaymentMethodSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Auth;

class CheckoutController extends BaseController
{
    // public function payment(Request $request){
    //     $sessionId = 1;
    //     $mid = $request->marchent_id;
    //     $tex = $random_pwd = mt_rand(1000000000000000, 9999999999999999);
    //     $txnRefNo = $request->order_id;
    //     $su = "https://toyshomekw.com";
    //     $fu = "https://toyshomekw.com";
    //     $amt = $request->total;
    //     $orderId =$request->order_id;
    //     $rndnum = rand(10000,99999);
    //     $crossCat = "GEN";
    //     $secretKey = $request->secret_key;
    //     $paymentoptions = $request->payment_method;
    //     $data = "$mid|$txnRefNo|$su|$fu|$amt|$crossCat|$secretKey|$rndnum";
    //     $hashed = hash('sha512', $data);
    //     $paymentGatewayUrl = $request->paymentGatewayUrl;
    //     $transactionDetails = array(
    //         array(
    //             "SubMerchUID" => "mer20000184",
    //             "Txn_AMT" => 50.0
    //         ),
    //     );
    //     $txnDtl = $transactionDetails;

    //     $txnHdr = array(
    //         "PayFor" => "ECom",
    //         "Txn_HDR" => $rndnum,
    //         "PayMethod" => $paymentoptions,
    //         "BKY_Txn_UID" => "",
    //         "Merch_Txn_UID" => $orderId,
    //         "hashMac" => $hashed
    //     );

    //     $appInfo = array(
    //         "APPTyp" => "WEB",
    //         "AppVer" => "2.0.0",
    //         "UsrSessID" => $sessionId,
    //         "APIVer" => "2.0.0"
    //     );

    //     $pyrDtl = array(
    //         "Pyr_MPhone" => "258474",
    //         "Pyr_Name" => "aaas"
    //     );

    //     $merchDtl = array(
    //         "BKY_PRDENUM" => "ECom",
    //         "FURL" => $fu,
    //         "MerchUID" => $mid,
    //         "SURL" => $su
    //     );

    //     $moreDtl = array(
    //         "Cust_Data1" => "",
    //         "Cust_Data3" => "",
    //         "Cust_Data2" => ""
    //     );
        
    //     $postParams['Do_TxnDtl'] = $txnDtl;
    //     $postParams['Do_TxnHdr'] = $txnHdr;
    //     $postParams['Do_Appinfo'] = $appInfo;
    //     $postParams['Do_PyrDtl'] = $pyrDtl;
    //     $postParams['Do_MerchDtl'] = $merchDtl;
    //     $postParams['DBRqst'] = "PY_ECom";
    //     $postParams['Do_MoreDtl'] = $moreDtl;

    //     $ch = curl_init();

    //     $headers = array(
    //         'Accept: application/json',
    //         'Content-Type: application/json',
    //     );

    //     curl_setopt($ch, CURLOPT_URL,$paymentGatewayUrl);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_HEADER, 0);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postParams));
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $serverOutput = curl_exec($ch);
    //     $decodeOutput = json_decode($serverOutput, true);
    //     curl_close ($ch);
    //     return $serverOutput;
    //     if (isset($decodeOutput['PayUrl'])) {
    //         if ($decodeOutput['PayUrl'] == '') {
    //             echo "Error Message: ".$decodeOutput['ErrorMessage']."aaa";
    //         }else{
    //             dd('111');
    //           return $decodeOutput['PayUrl'];
    //         }   
    //     }else if(isset($decodeOutput['Message'])){
    //         echo "Error Message: ".$decodeOutput['Message'];
    //     }else{
    //         echo "Error<br>";
    //         print_r($decodeOutput);
    //     }
    // }

        public function payment($order,$method,$user,$token){
        
        $payment_method = PaymentMethod::where('gateway',$method)->first();
        $setting = PaymentMethodSetting::where('payment_method_id',$payment_method->id)->first();

        if($method =="bookeey"){
            
            $sessionId = auth()->user()->id;
            $mid = $setting->marchent_id;
            $tex = $random_pwd = mt_rand(1000000000000000, 9999999999999999);
            $txnRefNo = $order->id;
            $su = route('checkout.success');
            $fu = route('checkout.faild');
            $amt = $order->total;
            $orderId =$order->id;
            $rndnum = rand(10000,99999);
            $crossCat = "GEN";
            $secretKey = $setting->secret_key;
            $paymentoptions = 'knet';
            $data = "$mid|$txnRefNo|$su|$fu|$amt|$crossCat|$secretKey|$rndnum";
            $hashed = hash('sha512', $data);
    
            $paymentGatewayUrl = $setting->domain;
            
            $transactionDetails = array(
                array(
                    "SubMerchUID" => $setting->marchent_id,
                    "Txn_AMT" => $order->total
                ),
            );
            $txnDtl = $transactionDetails;
    
            $txnHdr = array(
                "PayFor" => "ECom",
                "Txn_HDR" => $rndnum,
                "PayMethod" => $paymentoptions,
                "BKY_Txn_UID" => "",
                "Merch_Txn_UID" => $orderId,
                "hashMac" => $hashed
            );
    
            $appInfo = array(
                "APPTyp" => "WEB",
                "AppVer" => "2.0.0",
                "UsrSessID" => $sessionId,
                "APIVer" => "2.0.0"
            );
    
            $pyrDtl = array(
                "Pyr_MPhone" => auth()->user()->phone,
                "Pyr_Name" => auth()->user()->name
            );
    
            $merchDtl = array(
                "BKY_PRDENUM" => "ECom",
                "FURL" => $fu,
                "MerchUID" => $mid,
                "SURL" => $su
            );
    
            $moreDtl = array(
                "Cust_Data1" => "",
                "Cust_Data3" => "",
                "Cust_Data2" => ""
            );
            
            $postParams['Do_TxnDtl'] = $txnDtl;
            $postParams['Do_TxnHdr'] = $txnHdr;
            $postParams['Do_Appinfo'] = $appInfo;
            $postParams['Do_PyrDtl'] = $pyrDtl;
            $postParams['Do_MerchDtl'] = $merchDtl;
            $postParams['DBRqst'] = "PY_ECom";
            $postParams['Do_MoreDtl'] = $moreDtl;
    
            $ch = curl_init();
    
            $headers = array(
                'Accept: application/json',
                'Content-Type: application/json',
            );
    
            curl_setopt($ch, CURLOPT_URL,$paymentGatewayUrl);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postParams));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $serverOutput = curl_exec($ch);
            $decodeOutput = json_decode($serverOutput, true);
            curl_close ($ch);
    
            if (isset($decodeOutput['PayUrl'])) {
                if ($decodeOutput['PayUrl'] == '') {
                     return view('site.pages.faild', compact('order'));
                }else{
                    $orders = [];
                    $orders['id'] = $order->id;
                    $orders['url'] = $decodeOutput['PayUrl'];
                    $orders['user'] = $user;
                    $orders['token']= $token;
                    return response()->json(['success'=>'true','data'=>$orders,'message'=>'success'],200);
                }   
            }else if(isset($decodeOutput['Message'])){
                    return view('site.pages.faild', compact('order'));
            }else{
                    return view('site.pages.faild', compact('order'));
            }
        }
        if($method =="myfatoorah"){
            
            
        }
        
    }
    public function postCheckout(Request $request){
                // dd($request->all());
                $items= [];
                $product_ids =json_decode($request->product_ids);
                $quantitys=json_decode($request->quantitys);
                $prices=json_decode($request->prices);
                
                if(count($product_ids)!=count($quantitys)||count($product_ids)!=count($prices)){
                  return response()->json(['message'=>'Error the quantity count not equal to product ids and the prices'],200);
               }
                
                    $products = Product::whereIn('id',$product_ids)->get();
                    // dd($products);
                    
                    
                if(auth()->user()){
                    $user = User::where('id',auth()->user()->id)->first();
                    $address = UserAddress::where('id',$request->address)->first();
                    $auth = User::where('id',$user->id)->first();
                    
                }else{
                    $pass = rand(11111,99999);
                    $password = bcrypt($pass);
                    $user = User::create([
                    'name' => $request->first_name." ".  $request->last_name,
                    'phone' => $request->phone,
                    'password' =>$password 
                    ]);
                    $auth = User::where('id',$user->id)->first();
                    $ss=Auth::attempt(['phone' => $request->phone,'password' => $pass],true);
                    $address = UserAddress::create([
                       'first_name' => $request->first_name,
                       'last_name' => $request->last_name,
                       'city_id' => $request->city_id,
                       'address'  => $request->address_text,
                       'mobile'  => $request->phone,
                       'user_id'  => $user->id,
                       ]);
                }
                if($request->has('city_id')){
                    $shipping = City::where('id',$request->city_id)->first();
                }else{
                    $shipping = City::where('id',$address->city_id)->first(); 
                }
                  
                 $order = Order::create([
                        'order_number'=>rand(11111,99999),
                        'user_id'=>$user->id,
                        'total'=>$request->total,
                        'address_id' => $address->id,
                        'shipping_cost' => $shipping->shipping_cost,
                        'coupon_id' => $request->coupon_id,
                        'discount' => $request->coupon_value,
                        'status'=>'disapprove',
                        'method'=> $request->method
                    ]);

                    foreach ($products as $key=>$value){
                      $order_item = OrderItem::create([ 
                            'order_id'=>$order->id,
                            'product_id'=>$value['id'],
                            'price'=>$prices[$key],
                            'quantity'=>$quantitys[$key],
                        ]);  

                    }
                    
                    if($request->method == "cash"){
                        return response()->json(['success'=>'true','data'=>$order,'user'=>$auth,'token'=>$user->createToken('MyAuthApp')->plainTextToken,'message'=>'success'],200);
                    }
                    else{
                        return $this->payment($order,$request->method,$auth,$user->createToken('MyAuthApp')->plainTextToken);
                    }

    }
    public function order(Request $request){
                // dd($request->all());
                $items= [];
                $product_ids =json_decode($request->product_ids);
                $quantitys=json_decode($request->quantitys);
                $prices=json_decode($request->prices);
                
                if(count($product_ids)!=count($quantitys)||count($product_ids)!=count($prices)){
                  return response()->json(['message'=>'Error the quantity count not equal to product ids and the prices'],200);
               }
                
                    $products = Product::whereIn('id',$product_ids)->get();
                    // dd($products);
                    
                    
                if(auth()->user()){
                    $user = User::where('id',auth()->user()->id)->first();
                    $address = UserAddress::where('id',$request->address_id)->first();
                    $auth = User::where('id',$user->id)->first();
                    
                }else{
                    $pass = rand(11111,99999);
                    $password = bcrypt($pass);
                    $user = User::create([
                    'name' => $request->first_name." ".  $request->last_name,
                    'phone' => $request->phone,
                    'password' =>$password 
                    ]);
                    $auth = User::where('id',$user->id)->first();
                    $ss=Auth::attempt(['phone' => $request->phone,'password' => $pass],true);
                    $address = UserAddress::create([
                       'first_name' => $request->first_name,
                       'last_name' => $request->last_name,
                       'city_id' => $request->city_id,
                       'address'  => $request->address_text,
                       'mobile'  => $request->phone,
                       'user_id'  => $user->id,
                       ]);
                }
                if($request->has('city_id')){
                    $shipping = City::where('id',$request->city_id)->first();
                }else{
                    $shipping = City::where('id',$address->city_id)->first(); 
                }
                  
                 $order = Order::create([
                        'order_number'=>rand(11111,99999),
                        'user_id'=>$user->id,
                        'total'=>$request->total,
                        'address_id' => $address->id,
                        'shipping_cost' => $shipping->shipping_cost,
                        'coupon_id' => $request->coupon_id,
                        'discount' => $request->discount,
                        'status'=>'disapprove',
                        'method'=> $request->method
                    ]);

                    foreach ($products as $key=>$value){
                      $order_item = OrderItem::create([ 
                            'order_id'=>$order->id,
                            'product_id'=>$value['id'],
                            'price'=>$prices[$key],
                            'quantity'=>$quantitys[$key],
                        ]);  

                    }
                    
                    if($request->method == "cash"){
                        return response()->json(['success'=>'true','data'=>$order,'user'=>$auth,'token'=>$user->createToken('MyAuthApp')->plainTextToken,'message'=>'success'],200);
                    }
                    else{
                        return $this->payment($order,$request->method,$auth,$user->createToken('MyAuthApp')->plainTextToken);
                    }

    }
    public function paidOrder(Request $request){
        $order = Order::where(['id'=>$request->order_id,'user_id'=>auth()->user()->id])->first();
        if($order){
            $order->update(['paid' => 1]);
            return response()->json(['success'=>'true','data'=>$order,'message'=>'success'],200);
        }else{
            return response()->json(['success'=>'true','message'=>'Failed... this order not found'],200);
        }
    }

}