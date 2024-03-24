<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Contracts\CategoryContract;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{

    public function show($id)
    {
        $catg = Category::findOrFail($id);
        $subcategories = Category::where('parent_id',$id)->get();
        $products = Product::whereHas('productcategories',function ($q) use ($id){
            return $q->where('product_categories.category_id',$id);
        })->orderBy('created_at', 'desc')->paginate(12)->onEachSide(2);
        return view('site.pages.category-products', compact('products','catg','subcategories'));
    }
    
  
}
