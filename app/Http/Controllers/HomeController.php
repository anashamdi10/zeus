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
use App\Models\Counter;

use App\Models\ProductImage;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index(){
        
        $sliders = Slider::select("id", "title", "sub_title", "link")->get();
        $videos = Video::all()->toArray();
        $abouts = About::select('title', 'pragraph' , 'image')->get();
        $counter = Counter::select("id", "facilities", "Porducts", "Produced_Tons_in_2023", 'Oustees_Clients')->get();
        
        return view('site.pages.index',compact('sliders', 'videos' , 'abouts', 'counter'));
    }
    public function indexAr(){

        $sliders = Slider::select("id", "title_ar", "sub_title_ar", "link")->get();
        $videos = Video::all()->toArray();
        $abouts = About::select('title_ar', 'pragraph_ar' , 'image')->get();
        $counter = Counter::select("id", "facilities", "Porducts", "Produced_Tons_in_2023", 'Oustees_Clients')->get();
        
        return view('site.pages.index_ar',compact('sliders', 'videos' , 'abouts', 'counter'));
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
    
    

}
