<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\CategoryTerm;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slide;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomePageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if($request->daterange){
        $dates = explode(' - ', $request->daterange);
        $dateFrom =date('Y-m-d',strtotime($dates[0]));
        $dateTo =date('Y-m-d',strtotime($dates[1]));
        

        $this->setPageTitle('الصفحه الرئيسيه', '  محتواها');
        $users = User::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->count();
        $cats = Category::all()->count();
        $orders = Order::all()->count();
        // $aproveOrders = Order::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->where('status','approve')->get()->count();
        // $disaproveOrders = Order::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->where('status','disapprove')->count();
        // $payments = Order::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->where('status','approve')->select('total')->count();
        $products = Product::all()->count();
        $subCats = CategoryTerm::all()->count();
        $brands = Brand::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->count();
        $slides = Slide::whereDate('created_at','<=',$dateTo)->whereDate('created_at','>=',$dateFrom)->count();
        $orders_table = Order::select("product_name", "name", "quantity")->take(5)->get();
        }
        else{
            
            $this->setPageTitle('الصفحه الرئيسيه', '  محتواها');
        $users = User::whereDate('created_at',Carbon::today())->count();
        $cats = Category::all()->count();
        $subCats = CategoryTerm::all()->count();
        $orders = Order::all()->count();
            // $aproveOrders = Order::whereDate('created_at',Carbon::today())->where('status','approve')->get()->count();
            // $disaproveOrders = Order::whereDate('created_at',Carbon::today())->where('status','disapprove')->count();
            // $payments = Order::whereDate('created_at',Carbon::today())->where('status','approve')->select('total')->count();
        $products = Product::all()->count();
            
         $brands = Brand::whereDate('created_at',Carbon::today())->count();
         $slides = Slide::whereDate('created_at',Carbon::today())->count();
        $orders_table = Order::select("product_name", "name", "quantity")->take(5)->get();
            
        }
        // $new_orders = Order::where('status','disapprove')->count();
        // $done_orders = Order::where('status','received')->count();
        // $cancel_orders = Order::where('status','canceled')->count();
        // $pending_orders = Order::where('status','Approve')->count();
        $most_orderd= User::select('id','name','image')->take(8)->get();
        $most_sales= Product::select('id','name_ar', 'featured')->paginate(2);
        // $recent_orders = Order::orderBy('created_at', 'DESC')->take(10)->get();
        $shortages = Product::select('id', 'name_en', 'product_code', 'harvest_sessions')->get();
        // $total_order_today = Order::whereDate('created_at',Carbon::today())->sum('total');
        // $total_order_yestarday = Order::whereDate('created_at',Carbon::yesterday())->sum('total');
        // $total_order_week = Order::whereBetween('created_at',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');
        // $total_order_last_week = Order::whereBetween('created_at',[Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->sum('total');
        // $total_order_month = Order::whereMonth('created_at', Carbon::now()->month)->sum('total');
        // $total_order_last_month = Order::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->sum('total');
        // $total_order_year = Order::whereYear('created_at', Carbon::now()->year)->sum('total');
        // $total_order_last_year = Order::whereYear('created_at', '=', Carbon::now()->subYear()->year)->sum('total');
        return view('admin.index', compact('users','cats','orders','products','subCats','brands','slides','most_orderd','most_sales','shortages' , 'orders_table',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(HomePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePage $homePage)
    {
        //
    }

    public function orderIndex()
    {
        
        $data = Order::select('id',"product_name", "name" , 'email')->get();

        return view('admin.order.index', ['data' => $data]);
    }
    public function orderInfo($id)
    {
        $info = Order::find($id);
        

        return view('admin.order.show', ['info' => $info]);
    }

}
