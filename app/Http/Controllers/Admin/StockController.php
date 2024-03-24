<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Option;
use App\Models\ProductImage;
use App\Models\ProductOption;
use App\Models\ProductOptionValue;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\dashboard\ProductRequest;
use App\Http\Controllers\IMAGE_CONTROLLER;
use Session;
use SoapClient;

class StockController extends Controller
{
    
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Product::select('id','name_ar','quantity')->withSum('orders', 'quantity')->whereHas('orders')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '
                   <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row->id.'">
                          Edit Available Quantity
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal'.$row->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">معلومات المستخدم</h5>
                                        <button class="btn-close position-relative top-0 right-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="' . route('stocks.update', $row->id) .'" method="post">
                                        '.csrf_field().'
                                        '.method_field("PUT").'
                                        <div class="modal-body">
                                            <input class="form-control" type="number" name="quantity" value="'.$row->quantity.'">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
       
    }

    public function store(ProductRequest $request)
    {
       
    }

    public function edit($id)
    {
       
    }


    public function update(Request $request,$id)
    {
        $data=$request->all();
        $product=Product::find($id);
        $product->update([
            'quantity'=> $request->quantity
            ]);
       
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    public function destroy($id){
        $sub = ProductImage::select('full as img')->where('product_id',$id)->get();
        foreach($sub as $image){
            $file_path = storage_path().'/app/public/products/'.$image['img'];
            unlink($file_path); //delete from storage
        }

        Product::destroy($id);
        Session::flash('success','تم حذف الخدمه بنجاح..');
        return redirect()->back();
    }
    public function pos(){
        $posUsername = "S7sa.com@gmail.com";
        $secretKey = 'dGq@kePBfDGu&JPd';
        $signature = md5($posUsername . $secretKey);
        $client = new SoapClient('https://www.netader.com/webservice/OneCardPOSSystem.wsdl');
        $params = array(
            'posUsername' => $posUsername,
            'signature' => $signature,
        );
        $myXMLData = $client->POSGetProductList($params);
        $products = Product::pluck('product_code')->toArray();
        foreach($myXMLData->productList->product as $value){
            $pro = Product::where('product_code',$value->productCode)->first();
            if(in_array($value->productCode,$products)){
                $pro->update([
                    'pos_price'=>$value->posPrice,
                    'price'=>$value->productPrice,
                    'pos_currency'=>$value->posCurrency,
                    'available'=>$value->available,
                ]);
            }else{
                Product::create([
                    'product_code'=>$value->productCode,
                    'name_ar'=>$value->nameAr,
                    'name_en'=>$value->nameEn,
                    'description_ar'=>$value->nameAr,
                    'description_en'=>$value->nameEn,
                    'pos_price'=>$value->posPrice,
                    'price'=>$value->productPrice,
                    'pos_currency'=>$value->posCurrency,
                    'available'=>$value->available,
                ]);
            }

        }
        return response()->json($myXMLData);
    }
}
