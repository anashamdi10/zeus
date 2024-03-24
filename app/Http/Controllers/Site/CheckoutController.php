<?php

namespace App\Http\Controllers\Site;

use Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\UserAddress;
use App\Models\City;
use App\Models\Product;
use App\Models\StoreSetting;
use App\Models\User;
use App\Models\PaymentMethod;
use App\Models\PaymentMethodSetting;
use SoapClient;
use Session;
use Auth;



class CheckoutController extends Controller
{
    public function getCheckout()
    {
        $setting =StoreSetting::find(1);
        if($setting->order_with_login == "true"){
            return redirect(route('login'));
        }
        else{
             $cities = City::all();
             $payments = PaymentMethod::all();
            return view('site.pages.checkout',compact('cities','payments'));
        }
        
    }
    
    
    public function postCheckout(Request $request)
    {
        // dd($request->all());
        $items= [];
        foreach(\Cart::getContent() as $product){
                array_push($items,$product->id);
            }
            $products = Product::whereIn('id',$items)->get();
            
        if(auth()->user()){
            $user = User::where('id',auth()->user()->id)->first();
            $address = UserAddress::where('id',$request->address)->first();
          
        }else{
            $pass = rand(11111,99999);
            $password = bcrypt($pass);
            $user = User::create([
            'name' => $request->first_name." ".  $request->last_name,
            'phone' => $request->phone,
            'password' =>$password 
            ]);
            Auth::attempt(['phone' => $request->phone,'password' => $pass],true);
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
                'total'=>$request->totalCart,
                'address_id' => $address->id,
                'shipping_cost' => $shipping->shipping_cost,
                'coupon_id' => $request->coupon_id,
                'discount' => $request->coupon_value ?? 0,
                'status'=>'disapprove',
                'method'=> $request->method
            ]);
            foreach($products as $item){
                if($item->sale_price != null){
                    $price = $item->sale_price;
                }else{
                    $price = $item->price;
                }
                $order_item = OrderItem::create([ 
                    'order_id'=>$order->id,
                    'product_id'=>$item->id,
                    'price'=>$price,
                    'quantity'=>Cart::get($product->id)->quantity
                ]);
            }
            // Cart::clear();
            if($request->method != 'cash'){
                return $this->payment($order,$request->method);
            }else{
                return view('site.pages.success', compact('order'));
            }
    }
    
    public function payment($order,$method){
        
        
        $payment_method = PaymentMethod::where('gateway',$method)->first();
        $setting = PaymentMethodSetting::where('payment_method_id',$payment_method->id)->first();

        if($method =="bookeey"){
            
            $sessionId = auth()->user()->id;
            $mid = $setting->marchent_id;
            $tex = $random_pwd = mt_rand(1000000000000000, 9999999999999999);
            $txnRefNo = $order->id;
            $su = route('update_order');
            $fu = route('index.show');
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
                    return redirect()->to($decodeOutput['PayUrl']);
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
    
    public function place(Request $request){
        $order = Order::where('id',$request->merchantTxnId)->first();
        if($order){
            $order->paid = true;
            $order->save();
            return redirect()->route('index.show');;
        }else{
            return view('site.pages.faild', compact('order'));
        }
        
    }
    
    public function order(Request $request){
            $items= [];
            foreach(\Cart::getContent() as $product){
                array_push($items,$product->id);
            }
            $products = Product::whereIn('id',$items)->get();
            $address = UserAddress::where('id',$request->address)->first();
            $shipping = City::where('id',$address->city_id)->first();

            $order = Order::create([
                'order_number'=>rand(11111,99999),
                'user_id'=>auth()->user()->id,
                'total'=>$request->totalCart,
                'address_id' => $request->address,
                'shipping_cost' => $shipping->shipping_cost,
                'coupon_id' => $request->coupon_id,
                'discount' => $request->coupon_value,
                'status'=>'disapprove'
            ]);
            
            foreach($products as $item){
                $order_item = OrderItem::create([ 
                    'order_id'=>$order->id,
                    'product_id'=>$item->id,
                    'price'=>$item->price,
                    'quantity'=>Cart::get($product->id)->quantity
                ]);
            }
            Cart::clear();
            return view('site.pages.success', compact('order'));
    }
    
    // public function order(Request $request)
    // {
    //     if(auth()->user()->active != 0){
    //         $balance = $this->checkBalance();
    //         return !empty($balance) ? $this->storeOrder($request) : $balance;
    //     }else{
    //         Session::flash('success','يجب تفعيل حسابك قبل اتمام الطلب !');
    //         return redirect(route('login_code'));
    //     }
        
    // }
    // public function checkBalance(){
    //     $posUsername = "S7sa.com@gmail.com";
    //     $secretKey = 'dGq@kePBfDGu&JPd';
    //     $signature = md5($posUsername . $secretKey);
    //     $client = new SoapClient('https://www.netader.com/webservice/OneCardPOSSystem.wsdl');
    //     $params = array(
    //         'posUsername' => $posUsername,
    //         'signature' => $signature,
    //     );
    //     $myXMLData = $client->POSCheckBalance($params);
    //     return $myXMLData->balance;
    // }
    // public function storeOrder($request){
        
    //     $balance = $this->checkBalance();
    //     $total = Cart::getSubTotal();
    //     if($balance < $total){
    //         $order = Order::create([
    //             'order_number'=>rand(11111,99999),
    //             'user_id'=>auth()->user()->id,
    //             'total'=>$total,
    //             'status'=>'disapprove'
    //         ]);
    //         foreach(Cart::getContent() as $item){
    //             $order_item = OrderItem::create([ 
    //                 'order_id'=>$order->id,
    //                 'product_id'=>$item['id'],
    //                 'price'=>$item->price
    //             ]);
    //         }
    //         return $this->payment($order);
    //     }else{
    //         Session::flash('success','حدث خطأ غير متوقع حاول مرة احرى');
    //         return redirect()->back();
    //     }
        
    // }
    // public function payment($order){
    //         $email = $order->user->email??'example@example.com';
    //         $txn_details= "$order->id|s7sa|s7sa@URWAY_753|69f9f56daad82ed8948b19082b0752b699f5ccabaab32cf0db835e1abb79d2b1|$order->total|SAR";
    //         $hash=hash('sha256', $txn_details);
    //         $fields = array(
    //             'trackid' => $order->id ,
    //             'terminalId' => "s7sa",
    //             'customerEmail' => $email,
    //             'action' => "1", // action is always 1
    //             'merchantIp' =>"45.35.181.184",
    //             'password'=> "s7sa@URWAY_753",
    //             'currency' => "SAR",
    //             'country'=>"Saudi Arabia",
    //             'amount' => $order->total,
    //             'item'=> $order->number,
    //             "udf1"              =>"Test1",
    //             "udf2"              =>"https://s7sa.com/place/",//Response page URL
    //             "udf3"              =>"",
    //             "udf4"              =>"",
    //             "udf5"              =>"Test5",
    //             'requestHash' => $hash //generated Hash
    //         );
    //         $data = json_encode($fields);
    //         $ch=curl_init('https://payments.urway-tech.com/URWAYPGService/transaction/jsonProcess/JSONrequest');
    //         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    //         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //         curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //             'Content-Type: application/json',
    //             'Content-Length: ' . strlen($data))
    //         );
    //         curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    //         curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            
    //         //execute post
    //         $result = curl_exec($ch);
    //         if (curl_errno($ch)) {
    //             $error_msg = curl_error($ch);
    //         }
    //         $urldecode=(json_decode($result,true));
    //         if($urldecode['payid'] != NULL){
    //             $url=$urldecode['targetUrl']."?paymentid=".$urldecode['payid'];
    //             return redirect()->to($url);
                
    //         }else{
    //             echo "<b>Something went wrong!!!!</b>";
    //         }
    //         curl_close($ch);
    // }
    
    // public function place(Request $request){
    //     $txn_details= "$request->TranId|69f9f56daad82ed8948b19082b0752b699f5ccabaab32cf0db835e1abb79d2b1|$request->ResponseCode|$request->amount";
    //     $hash=hash('sha256', $txn_details);
    //     if($request->Result == 'Successful' && $request->ResponseCode == '000'){
    //         if($hash == $request->responseHash){
                
    //             $order = Order::where('id',$request->TrackId)->first();
    //             $order->status = 'approve';
    //             $order->method = $request->cardBrand;
    //             $order->save();
                
    //             $items = OrderItem::where('order_id',$request->TrackId)->get();
    //             $posUsername = "S7sa.com@gmail.com";
    //             $secretKey = 'dGq@kePBfDGu&JPd';
    //             foreach ($items as $value)
    //             {
    //                 $product = Product::where('id',$value->product_id)->first();
    //                 $productCode = $product->productCode;
    //                 $signature = md5($posUsername . $productCode . $secretKey);
    //                 $terminalId = $order->order_number;
    //                 $trxRefNumber = ($order->order_number . $productCode);
    //                 $client = new SoapClient('https://www.netader.com/webservice/OneCardPOSSystem.wsdl');
    //                 $params = array(
    //                     'posUsername'=>$posUsername,
    //                 	'productCode'=>$productCode,
    //                 	'signature'=>$signature,
    //                 	'terminalId'=>$terminalId,
    //                 	'trxRefNumber'=>$trxRefNumber
    //                 );
    //                 $myXMLData = $client->POSPurchaseProduct($params);
    //                 if($myXMLData->status){
    //                     $order->items()->update([
    //                         'serial'    =>  $myXMLData->serial,
    //                         'secret'    =>  $myXMLData->secret,
    //                     ]);
    //                 }
    //             }
    //             Cart::clear();
    //             return view('site.pages.success', compact('order'));
    //         }else{
    //             return view('site.pages.faild', compact('order'));
    //         }
    //     }else{
    //         return view('site.pages.faild', compact('order'));
    //     }
    // }
        public function success(){
        return view('site.pages.success');
    }
    public function faild(){
        return view('site.pages.faild');
    }
}
