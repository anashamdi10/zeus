<?php

namespace App\Http\Controllers\Site;

use App\Models\Page;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Mail\OrderEmail;
use Validator;
use Mail;
use Session;

use App\Models\Contact;
use App\Models\Order;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($slug)
    {
         $page=Page::where('slug',$slug)->first();
       return view('site.pages.show',compact('page'));
    }

    public function show($id)
    {
        $local = app()->getLocale();
        $page = Page::select('id','name_'.$local.' as name','description_'.$local.' as description')->where('id',$id)->first();
        return view('site.pages.about-us',compact('page'));
    }
    
     public function showBrand($id){
         $brand = Brand::findOrFail($id);
         $products = Product::where('brand_id',$id)->paginate(12);
         return view('site.pages.brand',compact('products','brand'));
     }
     
     
     public function contactUs(){
        return view('site.pages.contact-us');
     }
     
     public function contactUsStore(Request $request){
         	$data=$request->all();
           
    	    $validator = Validator::make($data, [
            'name'=>'required',
             'email'=>'required',
              'message'=>'required',
          ]);
        if($validator->fails()){
          return response()->json(['status'=>'0','errors'=>$validator->errors()->all()]);
        }
        
            $flag= Contact::create($data);
            if($flag){
                
                $error = 'true' ;

            

            
                // $details = [
                //     'recipient' => 'anashamdi76@gmail.com',
                //     'fromEmail' =>$request->email ,
                //     'name'      =>$request->name,
                //     'subject'   => $request->subject,
                //     'body'      => $request->message,
                // ];    

                // \Mail::send('site.pages.email.single-email',$details,function($message)use ($details){
                //     $message->to($details['recipient'])->from($details['fromEmail'],$details['name'])
                //     ->subject($details['subject']);
                // });
                return view('site.pages.contact-us', ['error' => $error]);
            
            }else{
                $error = 'false' ;
            
                return view('site.pages.contact-us',['error'=> $error]);
            }
    }

    public function products()
    {
        $categories = Category::select('id', 'name_en')->get();
        $products = Product::select('id',  'name_en')->where('featured', true)->get();

        foreach ($products as $product) {
            $product['category'] = get_field_value(new ProductCategory(), 'category_id', array('product_id' => $product->id));
            $product['image'] = get_field_value(new ProductImage(), 'full', array('product_id' => $product->id, 'main_full' => true));
        }
        return view('site.pages.product' , ['categories'=>$categories , 'products'=> $products]);
    }

    public function products_item($id){
        // produt item
        $product = get_cols_where_row(new Product() , array('id', 'name_en', 'description_en' , 'category_id' , 'product_code') , array('id'=>$id)); 
        
        $product_main_img = get_field_value(new ProductImage(), 'full' , array('product_id'=>$id , 'main_full'=>true));
        $product_images = get_cols_where(new ProductImage(), 'full', array('product_id' => $id, 'main_full' => false));
        $category_name = get_field_value(new Category(), 'name_en', array('id' => $product->category_id ));
        
        $related_productes = get_cols_where(new Product(), array('id' , "name_en"), array('category_id' => $product->category_id));

        foreach($related_productes as $related_producte){
            
            $related_producte['img'] = get_field_value(new ProductImage(), 'full', array('product_id' => $related_producte->id, 'main_full' => true));
        }

        $message = null ;
        return view('site.pages.products_item' , ['product'=>$product, 'product_main_img'=> $product_main_img , 'message' =>$message,
                    'product_images' => $product_images , 'related_productes'=> $related_productes , 'category_name'=> $category_name]);
    }

    public function product_list($id)
    {
        $categories = Category::select('id', 'name_en')->get();

        $related_productes = get_cols_where(new Product(), array('id', "name_en"), array('category_id' => $id));

        foreach ($related_productes as $product) {
            $product['category'] = get_field_value(new ProductCategory(), 'category_id', array('product_id' => $product->id));
            $product['image'] = get_field_value(new ProductImage(), 'full', array('product_id' => $product->id, 'main_full' => true));
        }
        return view('site.pages.product', ['categories' => $categories, 'products' => $related_productes]);
    }

    public function order_create(StoreOrderRequest $request)
    {
        
        $data = $request->all();
        Mail::to('info@woody-factory.com')->send(new OrderEmail());
        $flag = Order::create($data);
        if($flag){

            return redirect()->back()->with(['success' => 'Order complete']);
            
        }else{
            return redirect()->back()->with(['error' => 'Something wrong']);
        }
    }

    public function singlePage($name , $id)
    {
        
        // $page = get_cols_where_row(new Page(), array('id', 'name_en', 'description_en'), array('id' => $id)); 
    
        // return view('site.pages.page', ['page' =>$page]);
    }
    
}
