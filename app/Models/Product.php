<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use DB;
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = ['id', 'name_en',  'description_ar', 'description_en','featured' ,'product_code', 'category_id'];
     
    //  protected $appends = ['image','favouried','category','category_id','brand','rate','purchased','rated','has_option'];

    // protected $guarded = [];

    /**
     * @var array
     */
    protected $casts = [
        'quantity'  =>  'integer',
        'brand_id'  =>  'integer',
        'status'    =>  'boolean',
        'featured'  =>  'boolean',
        'available' => 'boolean',
    ];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name_ar'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'category_id', 'product_id');
    }

    public function productcategories()
    {
        return $this->hasMany(ProductCategory::class, 'product_id');
    }

    public function options(){
        return $this->belongsToMany(Option::class,'product_options','product_id','option_id');
    }
    
    public function optionDetails(){
        return $this->hasMany(ProductOption::class);
    }
    public function optionValues(){
        return $this->hasMany(ProductOptionValue::class);
    }
    public function flashDeals()
    {
        return $this->hasMany(FlashDeal::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    
    public function rates()
    {
        return $this->hasMany(ProductReview::class);
    }
    // public function getImageAttribute() {
        
    //     $product = ProductImage::select('full')->where('product_id',$this->id)->where('type','image')->first();
    //     if (is_null($product)) {
    //         return ('https://'.request()->getHost() . '/storage/products/prod-default.svg');
    //     }
    //     $image = $product->full;
    //     return $image;
        
    // }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function getNameAttribute()
    {
        $name = "name_".app()->getLocale();
        return $this->$name;
    }
    public function getDescriptionAttribute()
    {
        $name = "description_".app()->getLocale();
        return $this->$name;
    }


    public function getOptioncheckAttribute()
    {
       if($this->optionDetails){
        return true;
       }
       else{
           return false;
       }
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->where('status',1);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function orders()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function getOrders()
    {
       return $this->belongsToMany(Order::class, 'order_items', 'product_id', 'order_id'); 
    }

    public function getFavoriedAttribute()
    {
        if(Auth::user()){
            $data=Favorite::where('product_id',$this->id)->where('user_id',Auth::user()->id)->exists();
            if ($data) {
                return "ok";
            }
            return "false";
        }
    }
    
     public function getFavouriedAttribute()
    {
        if (request()->bearerToken() != null) {
            [$id, $user_token] = explode('|', request()->bearerToken(), 2);
            $token_data = DB::table('personal_access_tokens')->where('token', hash('sha256', $user_token))->first();
            $user_id = $token_data->tokenable_id; // !!!THIS ID WE CAN USE TO GET DATA OF YOUR USER!!!
             $fav = Favorite::where('user_id',$user_id)->where('product_id',$this->id)->first();
             if(!$fav){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function getCategoryAttribute() {
        $local=app()->getLocale();
        $productCategory = ProductCategory::where('product_id',$this->id)->first();
        if($productCategory){
        $category = Category::where('id',$productCategory->category_id)->select('name_'.$local.' as title')->first();
        return $category->title;}
        else{
            return null;
        }

    }
    
    public function getBrandAttribute() {
        $local=app()->getLocale();
        if($this->brand_id != null){
        $category = Brand::where('id',$this->brand_id)->select('name')->first();
        return $category->name;
        }else{
            return null;
        }
    }
    
    public function getRateAttribute() {
        $category = ProductReview::where('product_id',$this->id)->first();
        if($category){
            return $category->rate;
        }else{
            return 0;
        }
    }
    
    public function getRatedAttribute() {
        if (request()->bearerToken() != null) {
            [$id, $user_token] = explode('|', request()->bearerToken(), 2);
            $token_data = DB::table('personal_access_tokens')->where('token', hash('sha256', $user_token))->first();
            $user_id = $token_data->tokenable_id; // !!!THIS ID WE CAN USE TO GET DATA OF YOUR USER!!!
        $category = ProductReview::where('product_id',$this->id)->where('user_id',$user_id)->first();
        if($category){
            return true;
        }else{
            return false;
        }
        }else{
            return false;
        }
    }
    
    public function getPurchasedAttribute() {
        if (request()->bearerToken() != null) {
            [$id, $user_token] = explode('|', request()->bearerToken(), 2);
            $token_data = DB::table('personal_access_tokens')->where('token', hash('sha256', $user_token))->first();
            $user_id = $token_data->tokenable_id; // !!!THIS ID WE CAN USE TO GET DATA OF YOUR USER!!!
            $order = Order::where('user_id',$user_id)->whereHas('items',function($q){
                $q->where('product_id',$this->id);
            })->get();
            if($order == null){
                return false;
            }else{
                return true;
            }
            
        }else{
            return false;
        }
        
        
    }
    
    public function getBuyedAttribute(){
        if(Auth::user()){
            $data=Order::where('user_id',Auth::user()->id)->whereHas('items',function($q){
                $q->where('product_id',$this->id);
            })->get();
            if ($data->isEmpty()) {
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    
    
    public function getHasOptionAttribute()
    {
       $product=  Product::where('id',$this->id)->whereHas('optionDetails')->first();
        if($product ){
            return true;
        }
        else{
            return false;
        }
    }
    
    
      public function getAvgRate()
    {
        $sumReviews =ProductReview::where('product_id',$this->id)->sum('rate');
        $countReviews =ProductReview::where('product_id',$this->id)->count();
        if($countReviews != 0){
        $rate = $sumReviews/$countReviews;
        return round($rate);
        }else{
            return 0;
        }
        
        
    }
    
    
    public function getCategoryIdAttribute() {
        $local=app()->getLocale();
        $productCategory = ProductCategory::where('product_id',$this->id)->first();
        if($productCategory){
        return $productCategory->category_id;}
        else{
            return null;
        }

    }
    
    
   
    
    
    
}
