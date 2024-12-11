<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\CategoryTerm;
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

class ProductController extends Controller
{
    function __construct()
    {
    }



    public function index(Request $request){
        if ($request->ajax()) {
            $data = Product::select('id', 'name_en')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn ='<div class="d-flex align-items-center flex-wrap gap-3"><a href="product/'.$row->id.'/edit" data-id="'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn.'<form action="'.route('products.destroy',$row->id).'" method="POST">
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
        $categories = Category::select('id', 'name_en')->get();
        
        $options = Option::select('id', 'name_en')->get();
        $brands = Brand::select('id','name')->get();
        return view('admin.product.create',compact('categories','brands','options'));
    }

    public function store(ProductRequest $request)
    {
    
        $data=$request->all();
        // dd($data);
        $create = Product::create($data);
        
//            dd($category);
        $productcategories = new ProductCategory();
        $productcategories->product_id = $create->id ;
        $productcategories->category_id =$request->category_id;
        $productcategories->save();

    
        
        foreach($request->images as $idex => $file)
        {
            
            $image_new_name = time() . $idex  .'.'. $file->getClientOriginalExtension();
            $file->move('uploads/products/', $image_new_name);
            $productimages = new ProductImage();
            $productimages->product_id = $create->id ;
            $productimages->full = $image_new_name;
            $productimages->main_full = false;
            $productimages->sub_main = false;
            $productimages->save();
        }

        $mainImage = new ProductImage();
        $file = $request->file('main_full');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        $file->move('uploads/products/', $filename);
        
        // main images
        $mainImage->product_id = $create->id;
        $mainImage->full = $filename;
        $mainImage->main_full = true;
        $mainImage->sub_main = false;
        $mainImage->save();
        
        // sub main image

        $sub_image = new ProductImage();
        
        $file1 = $request->file('sub_main');
        $extension = $file1->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        $file1->move('uploads/products/', $filename);


        $sub_image->product_id = $create->id;
        $sub_image->full = $filename;
        $sub_image->main_full = false;
        $sub_image->sub_main = true;
        $sub_image->save();

        
            //         if($request->has('option_ids')){
            //     foreach($request->option_ids as $option_id) {
            //                 $productoptions = new ProductOption();
            //                 $productoptions->product_id = $create->id ;
            //                 $productoptions->option_id =$option_id;
            //                 $productoptions->save();

            //         }
            // foreach ($request->quantities as $key => $value) {
            //     if($request->itemimage[$key] != null){
            //         $itemImage = time() . $request->itemimage[$key]->getClientOriginalName();
            //         $request->itemimage[$key]->move(storage_path().'/app/public/products', $itemImage);
            //     }else{
            //         $itemImage = null;
            //     }
            //     ProductOptionValue::create([
            //         'product_id' =>$create->id,
            //         'option_id' =>$request->option_ids[$key],
            //         'option_value_id' =>$request->option_value_ids[$key],
            //         'quantity' => $value,
            //         'subtract' =>$request->subtract[$key],
            //         'price' =>$request->prices[$key],
            //         'price_prefix' =>$request->price_prefixes[$key],
            //         'points' =>$request->points[$key],
            //         'points_prefix' =>$request->points_prefixes[$key],
            //         'weight' =>$request->weights[$key],
            //         'weight_prefix' =>$request->weight_prefixes[$key],
            //         'image' => $itemImage,

            //     ]);
        

        Session::flash('success','تمت الاضافة بنجاح');
        return redirect()->back();
    }

    public function edit($id)
    {
        $info = Product::find($id);
        $product_id = $info->id;
        $main_image = ProductImage::where(['product_id'=>$product_id , 'main_full'=>true])->value('full');
        $sub_image = ProductImage::where(['product_id'=>$product_id , 'sub_main'=>true])->value('full');
        
        $images = ProductImage::select('full')->where(['product_id'=>$product_id , 'main_full'=>false])->get();
        
        
        
        $options = Option::select('id','name_ar')->get();
        $categories = Category::select('id', 'name_en')->get();
        $brands = Brand::select('id','name')->get();
        $categoryterms = get_cols_where(new CategoryTerm(), array('*'), array('category_id' => $info->category_id));

        return view('admin.product.edit',compact('info','categories','brands','options', 'main_image', 'images', 'categoryterms', 'sub_image'));
    }


    public function update(ProductRequest $request,$id)
    {
        $data=$request->all();
        $product=Product::find($id);

        foreach($product->productcategories as $productcategory){
            $productcategory->delete();
        }
        
                $productcategories = new ProductCategory();
                $productcategories->product_id = $id;
                $productcategories->category_id = $request->category_id;
                $productcategories->save();
        

        if($request->images != null){
            foreach($request->images as $idex=> $file)
            {
                $id_image = get_field_value(new ProductImage(), 'full', array('product_id' => $id, 'main_full' => false));
                $oldphotoPath = $id_image;
                if (file_exists('uploads/products/' . $oldphotoPath) and !empty($oldphotoPath)) {
                    unlink('uploads/products/' . $oldphotoPath);
                }

                

                $image_new_name = time() . $idex  . '.' . $file->getClientOriginalExtension();
                $file->move( 'uploads/products/', $image_new_name);
                $productimages = new ProductImage();
                $productimages->product_id = $id ;
                $productimages->full = $image_new_name;
                $productimages->main_full = false;
                $productimages->sub_main = false;
                $productimages->save();
            }
        }
        if ($request->main_full != null) {
            $id_image = get_field_value(new ProductImage(), 'full', array('product_id' => $id, 'main_full' => true));
            $oldphotoPath = $id_image;
            if (file_exists('uploads/products/' . $oldphotoPath) and !empty($oldphotoPath)) {
                unlink('uploads/products/' . $oldphotoPath);
            }

            delete(new ProductImage(), array('product_id' => $id, 'full' =>  $oldphotoPath , 'main_full' => true));
            
            
            $mainImage = new ProductImage();
            $file = $request->file('main_full');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time(). '.' . $extension;
            $file->move('uploads/products/', $filename);


            $mainImage->product_id = $id;
            $mainImage->full = $filename;
            $mainImage->main_full = true;
            $mainImage->sub_main = false;
            $mainImage->save();
        }
        if ($request->sub_main != null) {
            $id_image = get_field_value(new ProductImage(), 'full', array('product_id' => $id, 'sub_main' => true));
            $oldphotoPath = $id_image;
            if (file_exists('uploads/products/' . $oldphotoPath) and !empty($oldphotoPath)) {
                unlink('uploads/products/' . $oldphotoPath);
            }

            delete(new ProductImage(), array('product_id' => $id, 'full' =>  $oldphotoPath , 'sub_main' => true));
            
            
            $sub_Image = new ProductImage();
            $file = $request->file('sub_main');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time(). '.' . $extension;
            $file->move('uploads/products/', $filename);


            $sub_Image->product_id = $id;
            $sub_Image->full = $filename;
            $sub_Image->main_full = false;
            $sub_Image->sub_main = true;
            $sub_Image->save();
        }

        Product::find($id)->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    public function destroy($id){
        $sub = ProductImage::select('full as img')->where('product_id',$id)->get();
        foreach($sub as $image){
            $file_path = storage_path(). 'uploads/products/'.$image['img'];
            
            if (file_exists('uploads/products/' . $file_path)) {
                unlink('uploads/products/' . $file_path);
            }
           
        }

         delete(new ProductImage(), array('product_id'=> $id));
        $flag = delete(new Product(), array('id'=> $id));
        if($flag){
            Session::flash('success','تم حذف الخدمه بنجاح..');
        }else{
            Session::flash('success','حدث خطأ ما ');

        }
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

    public function products_images_deletes($id_images){

        $id = get_field_value(new ProductImage(), 'product_id',array('full'=>$id_images));

        if (file_exists('uploads/products/' . $id_images)) {
            unlink('uploads/products/' . $id_images);
        }
        delete(new ProductImage(), array('product_id' => $id, 'full' =>  $id_images, 'main_full' => false));

        Session::flash('success', 'تم  حدف الصورة  بنجاح');
        return redirect()->back();
    }

    public function select_sub_category(Request $request){
        if ($request->ajax()) {
            $cat_id = $request->category_id ;
            $categoryterms = get_cols_where(new CategoryTerm(), array('*'), array('category_id'=>$cat_id));
            return view('admin.product.category_term_ajax', compact('categoryterms'));
        }
    }
}
