<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\OrderRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;

class OrderController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Order::select('orders.id','orders.order_number','orders.total','orders.status','orders.paid','users.name as user')->join('users','users.id','=','orders.user_id')->get();
            return DataTables::of($data)->addIndexColumn()
            
                ->addColumn('action', function($row){
                    $btn ='<div class="d-flex align-items-center flex-wrap gap-3"><a href="order/'.$row->id.'/show" data-id="'.$row->id.'" class="btn btn-secondary btn-sm">Show</a>';
                    $btn =$btn.'<a href="order/'.$row->id.'/edit" data-id="'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn.'<form action="'.route('orders.destroy',$row->id).'" method="POST">
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

    public function create()
    {
        $users = User::select('id','name')->get();
        $products = Product::all();
        return view('admin.order.create',compact('users','products'));
    }

    public function store(OrderRequest $request)
    {
        $data=$request->all();

        $create = Order::create($data);

        foreach ($request->price as $key => $value) {
            $create1 = OrderItem::create([
                'product_id' =>$request->product_id[$key],
                'order_id' =>$create->id,
                'serial' => $request->serial[$key],
                'secret' => $request->secret[$key],
                'price' => $value,
            ]);
        }

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }

    public function edit($id)
    {
        $info = Order::find($id);
        $users = User::select('id','name')->get();
        $orderitems = OrderItem::where('order_id',$id)->get();
        $products = Product::all();
        return view('admin.order.edit',compact('info','users','orderitems','products'));
    }


    public function update(OrderRequest $request,$id)
    {
        $order = Order::findOrFail($id);
        $data=$request->all();
        Order::find($id)->update($data);


        $orderitems = OrderItem::where('order_id',$id)->get();
//        dd($productoptions);
        foreach($orderitems as $orderitem){
            OrderItem::destroy($orderitem->id);
        }

        foreach ($request->price as $key => $value) {
            $create1 = OrderItem::create([
                'product_id' =>$request->product_id[$key],
                'order_id' =>$order->id,
                'serial' => $request->serial[$key],
                'secret' => $request->secret[$key],
                'price' => $value,
            ]);
        }


        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }


    public function destroy($id){

        Order::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }

    public function show($id){
        $info = Order::find($id);
        return view('admin.order.show',compact('info'));
    }
    
    
     public function status(Request $request)
    {
        // dd($request->all());
        $order=Order::find($request->order_id);
        $order->update(['status'=>$request->status]);
        
        Notification::create([
            'title_ar' => 'الطلب رقم  #'.$request->order_id,
            'title_en' => 'order number #'.$request->order_id,
            'description_ar' => $request->status,
            'description_en' => $request->status,
            'user_id' => $order->user_id,
            'object_id' => $request->order_id
            ]);
        
        return redirect()->back();
    }
    
    
    public function paymentStatus(Request $request)
    {
        // dd($request->all());
        $ad=Order::find($request->order_id);
        $ad->update(['paid'=>$request->status]);
        return redirect()->back();
    } 
}
