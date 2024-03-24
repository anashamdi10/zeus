<?php

namespace App\Http\Controllers;

use App\Models\About;
use Cart;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slide;
use App\Models\FlashDeal;
use App\Models\Review;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Video;

use App\Models\ProductImage;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index(){
        $local=app()->getLocale();
        // $categories = Category::where('parent_id',null)->get();

        // $sliders = Slide::get();

        // $products = Product::select('id',  'name_en' )->where('featured',true)->limit(8)->get();

        // foreach($products as $product){
        //     $category_id = get_field_value(new ProductCategory(), 'category_id' , array('product_id'=>$product->id));
        //     $product['category'] = get_field_value(new Category(), 'name_en' , array('id' =>$category_id));
        //     $product['image'] = get_field_value(new ProductImage(), 'full' , array('product_id'=>$product->id ,'main_full'=>true));
        // }
        // $flashs = get_cols_where_row(new FlashDeal(),array('*'), array('status'=>1));


        // $review = Review::select('id', 'name', 'opinion', 'work', 'image')->get();
        // $pages = Page::select('id', 'name_ar')->get();

        $sliders = Slider::select("id", "title", "sub_title", "link")->get();
        $videos = Video::all()->toArray();
        $abouts = About::select('title', 'pragraph' , 'image')->get();
        
        return view('site.pages.index',compact('sliders', 'videos' , 'abouts'));
    }
    
    public function rateIndex(){
        $local=app()->getLocale();
        $data = Product::select('id','name_'.$local.' as title','price','sale_price','quantity')->whereHas('categories')->where('available',true)->limit(8)->get();
        $products = $data->sortByDesc(function ($product) {
            return $product->rates->sum('rate');
        });
        return $products;
    }
    
    public function saleIndex(){
        $local=app()->getLocale();
        $data = Product::select('id','name_'.$local.' as title','price','sale_price','quantity')->where('sale_price','!=',null)->where('available',true)->limit(8)->get();
        $products = $data->sortByDesc(function ($product) {
            return $product->orders->sum('quantity');
        });
        return $products;
    }
    
    public function brandsIndex(){
        $local=app()->getLocale();
        $brands = Brand::get();
        return $brands;
    }
    
    

}
