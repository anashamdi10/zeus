<?php

namespace App\Http\Controllers\Api;


use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Setting;
use App\Http\Resources\Blog as BlogResource;
use DB;
use App\Models\Product;

class OrderController extends BaseController
{

    public function index(){
      $orders = Order::where('orders.user_id',auth()->user()->id)->select('orders.id','orders.order_number','orders.total','orders.created_at','orders.status')->get();
          $data=$orders;
        return response()->json(['orders'=>$data,'success'=>true],200);

    }

public function show($id){
       $local=app()->getLocale();
       $setting = Setting::find(1);
       $order = Order::where('orders.id',$id)->where('orders.user_id',auth()->user()->id)->select('orders.status','orders.id','orders.order_number','orders.created_at','orders.total','orders.method','orders.discount','orders.shipping_cost','user_addresses.first_name','user_addresses.last_name','user_addresses.mobile','user_addresses.address','user_addresses.city_id','cities.name')->join('user_addresses','user_addresses.id','orders.address_id')->join('cities','cities.id','user_addresses.city_id')
       ->with('items',function($query) use($local){
           $query->select('order_items.order_id','order_items.product_id','order_items.quantity','order_items.price')
          ->with('product',function($q) use($local){
          $q->select('products.id','products.name_'.$local.' as title');
        });
       })
       ->first();  
      
    return response()->json(['order'=>$order,'tax'=>$setting->tax,'success'=>true],200);
}



public function cancel(Request $request){
    $id  = $request->id;
    $order = Order::where('id',$id)->first();
    $order->status = 'canceled';
    $order->save();
    return response()->json(['data'=> $order,'message'=>'success in canceled order','status'=>true]);
}


public function store(Request $request){
// dd($request->all());

    $validator = Validator::make($request->all(), [
        'total'=> 'required',
        'method'=> 'required',
        'address_id' => 'required',
        'shipping_cost' => 'required',
    ]);

    if($validator->fails()){
        return response()->json($validator->errors()->toJson(), 400);
    }

 try{

    $order=[];
        DB::transaction(function() use($request,&$order)
               {


                $products =json_decode($request->product_ids);
                $quantitys=json_decode($request->quantitys);
                $prices   =json_decode($request->prices);


               if(count($products)!=count($prices)){

                throw new Exception('Error the price count not equal to product ids');

               }

               $order = Order::create([
                'order_number'      =>   strtoupper(uniqid()),
                'user_id'           =>   auth()->user()->id,
                'total'             =>   $request->total,
                'method'    =>   $request->method,
                'shipping_cost' => $request->shipping_cost,
                'address_id' => $request->address_id,
                'coupon_id' => $request->coupon_id,
                'discount' => $request->discount
               
            ]);

            foreach ($products as $key=>$value)
        {


            $product = Product::where('id',$value)->first();
            if(!$product){
                throw new Exception('No Products found with that id '.$value);
                 return response()->json(['success'=>'false','message'=>'No Products found with that id '.$value]);
            }
            if($product->quantity==0){
                return response()->json(['success'=>'false','message'=>'this product quantity is zero ']);
            }

            if($product->quantity<$quantitys[$key]){
             return response()->json(['success'=>'false','message'=>'this product quantity is less than order quantity ']);
            }

             $order->items()->create([
                'product_id'    =>  $product->id,
                'quantity'      => $quantitys[$key],
                'price'         => $prices[$key],
            ]);
            $product->decrement('quantity', $quantitys[$key]);
           
        }


            });

            return response()->json(['data'=> $order,'message'=>'success in making order','error'=>false]);


 }catch(Exception $e){
     return response()->json(['message'=>'Error in making this order repeat again','error'=>true]);
 }





   }
   public function place(Request $request){
            $order = Order::where('id',$request->TrackId)->first();
            $order->status = 'approve';
            $order->payment_method = $request->cardBrand;
            $order->save();
            $items = OrderItem::where('order_id',$request->TrackId)->get();
            // $posUsername = "S7sa.com@gmail.com";
            // $secretKey = 'dGq@kePBfDGu&JPd';
            // foreach ($items as $value)
            // {
            //     $product = Product::where('id',$value->product_id)->first();
            //     $productCode = $product->productCode;
            //     $signature = md5($posUsername . $productCode . $secretKey);
            //     $terminalId = $order->order_number;
            //     $trxRefNumber = ($order->order_number . $productCode);
            //     $client = new SoapClient('https://www.netader.com/webservice/OneCardPOSSystem.wsdl');
            //     $params = array(
            //         'posUsername'=>$posUsername,
            //     	'productCode'=>$productCode,
            //     	'signature'=>$signature,
            //     	'terminalId'=>$terminalId,
            //     	'trxRefNumber'=>$trxRefNumber
            //     );
            //     $myXMLData = $client->POSPurchaseProduct($params);
            //     if($myXMLData->status){
            //         $order->items()->update([
            //         'serial'    =>  $myXMLData->serial,
            //         'secret'    =>  $myXMLData->secret,
            //     ]);
            //     }
            // }
            return response()->json(['data'=> new OrderResource($order),'message'=>'success in making order','error'=>false]);
    }
}
