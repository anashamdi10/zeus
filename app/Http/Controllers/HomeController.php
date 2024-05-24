<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Certificates;
use Cart;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryTerm;
use App\Models\Product;
use App\Models\Facilities;

use App\Models\Slider;
use App\Models\Video;
use App\Models\Counter;
use App\Models\WhyUs;
use App\Models\our_news;
use App\Models\Our_services;


use App\Models\ProductImage;
use Faker\Provider\Image;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index(){
        
        $sliders = Slider::select("id", "title", "sub_title", "link")->get();
        $videos = Video::all()->toArray();
        $abouts = About::select('title', 'pragraph' , 'image')->get();
        $counter = Counter::select("id", "facilities", "Porducts", "Produced_Tons_in_2023", 'Oustees_Clients')->get();
        $why_us = WhyUs::select("id", "title", "pragraph_en", "image")->get();
        $our_services = Our_services::select("id", "title_en", "pragraph_en", "image")->get();
        $our_news = our_news::select("id", "writer_en", "title_en", "pragraph_en" , "date","image")->get();
        $products_Featured = get_cols_where(new Product(),array("id", "name_en", 'sub_title'), array('featured'=>true),'id','ASC');

        foreach( $products_Featured as $info){

            $info->main_image = get_cols_where(new ProductImage(),array('full'),array('product_id'=>$info->id,'main_full'=>true));

            $info->sub_image  = get_cols_where(new ProductImage(),array('full'),array('product_id' => $info->id,'sub_main'=>true));
        }
        



        return view('site.pages.en.index',compact('sliders', 'videos' , 'abouts', 'counter' , 'why_us' , 'our_services' , 'our_news', 'products_Featured'));
    }
    public function indexAr(){

        $sliders = Slider::select("id", "title_ar", "sub_title_ar", "link")->get();
        $videos = Video::all()->toArray();
        $abouts = About::select('title_ar', 'pragraph_ar' , 'image')->get();
        $counter = Counter::select("id", "facilities", "Porducts", "Produced_Tons_in_2023", 'Oustees_Clients')->get();
        $why_us = WhyUs::select("id", "title_ar", "pragraph_ar", "image")->get();
        $our_services = Our_services::select("id", "title_ar", "pragraph_ar", "image")->get();
        $our_news = our_news::select("id", "writer_ar", "title_ar", "pragraph_ar", "date", "image")->get();

        $products_Featured = get_cols_where(new Product(), array("id", "name_ar", 'sub_title_ar'), array('featured' => true), 'id', 'ASC');

        foreach ($products_Featured as $info) {

            $info->main_image = get_cols_where(new ProductImage(), array('full'), array('product_id' => $info->id, 'main_full' => true));

            $info->sub_image  = get_cols_where(new ProductImage(), array('full'), array('product_id' => $info->id, 'sub_main' => true));
        }

        return view('site.pages.ar.index_ar',compact('sliders', 'videos' , 'abouts', 'counter' ,'why_us' , 'our_services', 'our_news', 'products_Featured' ));
    }
    
    public function rateIndex(){
        
        $data = Product::select('id','name_'.$local.' as title','price','sale_price','quantity')->whereHas('categories')->where('available',true)->limit(8)->get();
        $products = $data->sortByDesc(function ($product) {
            return $product->rates->sum('rate');
        });
        return $products;
    }
    
    public function saleIndex(){
        
        $data = Product::select('id','name_'.$local.' as title','price','sale_price','quantity')->where('sale_price','!=',null)->where('available',true)->limit(8)->get();
        $products = $data->sortByDesc(function ($product) {
            return $product->orders->sum('quantity');
        });
        return $products;
    }
    
    public function brandsIndex(){
        $brands = Brand::get();
        return $brands;
    }

    public function product_info($id){
        $productInfo = get_cols_where_row(new Product(),array("*"),array('id'=>$id));
        $category_name = get_field_value(new Category(), 'name_en',array('id'=>$productInfo->category_id));
        $category_term = get_field_value(new CategoryTerm(), 'content_en',array('category_id'=>$productInfo->category_id));
        $images = ProductImage::select('full')->where(['product_id' => $productInfo->id])->get();

        
        $related_products = Product::where([
            ['id', '!=', $id],
            ['category_id' ,'=' , $productInfo->category_id ]
        
        ])->get();

        
        foreach ($related_products as $info) {

            $info->main_image = get_cols_where(new ProductImage(), array('full'), array('product_id' => $info->id, 'main_full' => true));

            $info->sub_image  = get_cols_where(new ProductImage(), array('full'), array('product_id' => $info->id, 'sub_main' => true));
        }

        return view('site.pages.en.product_en', compact('productInfo', 'category_name', 'category_term', 'images' , 'related_products'));

    }
    public function product_info_ar($id){
        $productInfo = get_cols_where_row(new Product(),array("*"),array('id'=>$id));
        $category_name = get_field_value(new Category(), 'name_ar',array('id'=>$productInfo->category_id));
        $category_term = get_field_value(new CategoryTerm(), 'content_ar',array('category_id'=>$productInfo->category_id));
        $images = ProductImage::select('full')->where(['product_id' => $productInfo->id])->get();

        
        $related_products = Product::where([
            ['id', '!=', $id],
            ['category_id' ,'=' , $productInfo->category_id ]
        
        ])->get();

        
        foreach ($related_products as $info) {

            $info->main_image = get_cols_where(new ProductImage(), array('full'), array('product_id' => $info->id, 'main_full' => true));

            $info->sub_image  = get_cols_where(new ProductImage(), array('full'), array('product_id' => $info->id, 'sub_main' => true));
        }

        return view('site.pages.ar.product_ar', compact('productInfo', 'category_name', 'category_term', 'images' , 'related_products'));

    }

    public function shop_en()
    {
        $products = Product::all();
        foreach($products as $product){
            $product->image = get_cols_where_row(new ProductImage(), array("full"), array('product_id' => $product->id, 'main_full'=>true));
        }

        
        $categories = Category::all();
        return view('site.pages.en.shop_en', compact('products', 'categories'));

    }
    public function shop_ar()
    {
        $products = Product::all();
        foreach($products as $product){
            $product->image = get_cols_where_row(new ProductImage(), array("full"), array('product_id' => $product->id, 'main_full'=>true));
        }

        
        $categories = Category::all();
        return view('site.pages.ar.shop_ar', compact('products', 'categories'));

    }


    public function select_sub_category(Request $request)
    {
        if ($request->ajax()) {
            $cat_id = $request->category_id;
            $categoryterms = get_cols_where(new CategoryTerm(), array('*'), array('category_id' => $cat_id));
            return view('site.pages.en.category_term_ajax', compact('categoryterms'));
        }
    }
    public function products_search(Request $request)
    {
        if ($request->ajax()) {
            $cat_id = $request->category_id;
            $category_term = $request->category_term;
            if($cat_id == 'code'){
                
                $products = Product::all();
            }else{

                $products = get_cols_where2_p(new Product(), array('*'), array('category_id' => $cat_id), 'category_term','=', $category_term,'id',"Asc",10);
            }
            
            foreach ($products as $product) {
                $product->image = get_cols_where_row(new ProductImage(), array("full"), array('product_id' => $product->id, 'main_full' => true));
            }


            return view('site.pages.en.products_ajax', compact('products'));
        }
    }

    public function select_sub_category_ar(Request $request)
    {
        if ($request->ajax()) {
            $cat_id = $request->category_id;
            $categoryterms = get_cols_where(new CategoryTerm(), array('*'), array('category_id' => $cat_id));
            return view('site.pages.ar.category_term_ajax', compact('categoryterms'));
        }
    }

    public function products_search_ar(Request $request)
    {
        if ($request->ajax()) {
            $cat_id = $request->category_id;
            $category_term = $request->category_term;
            if ($cat_id == 'code') {

                $products = Product::all();
            } else {

                $products = get_cols_where2_p(new Product(), array('*'), array('category_id' => $cat_id), 'category_term', '=', $category_term, 'id', "Asc", 10);
            }

            foreach ($products as $product) {
                $product->image = get_cols_where_row(new ProductImage(), array("full"), array('product_id' => $product->id, 'main_full' => true));
            }


            return view('site.pages.ar.products_ajax', compact('products'));
        }
    }


    public function about()
    {
        $data = get_cols_where_row(new About(), array('*'));
        $certificates = Certificates::select('id', 'title', 'city', 'image')->get();
        $counter = Counter::select("id", "facilities", "Porducts", "Produced_Tons_in_2023", 'Oustees_Clients')->get();
        return view('site.pages.en.about_en',['data'=>$data , 'certificates' => $certificates , 'counter' => $counter]);
    }
    public function about_ar()
    {
        $data = get_cols_where_row(new About(), array('*'));
        $certificates = Certificates::select('id', 'title_ar', 'city_ar', 'image')->get();
        $counter = Counter::select("id", "facilities", "Porducts", "Produced_Tons_in_2023", 'Oustees_Clients')->get();
        return view('site.pages.ar.about_ar',['data'=>$data , 'certificates' => $certificates , 'counter' => $counter]);
    }

    public function facilities()
    {
        $data = Facilities::select("id", "title", "pragraph", 'image')->get();
        $counter = Counter::select("id", "facilities", "Porducts", "Produced_Tons_in_2023", 'Oustees_Clients')->get();

        return view('site.pages.en.facilities_en', ['data' => $data , 'counter'=> $counter]);
    }
    public function facilities_ar()
    {
        $data = Facilities::select("id", "title_ar", "pragraph_ar", 'image')->get();
        $counter = Counter::select("id", "facilities", "Porducts", "Produced_Tons_in_2023", 'Oustees_Clients')->get();
        return view('site.pages.ar.facilities_ar', ['data' => $data , 'counter'=> $counter]);
    }


}
