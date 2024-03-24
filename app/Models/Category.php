<?php

namespace App\Models;

use App\Models\Product;
//use TypiCMS\NestableTrait;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
//    use NestableTrait;

    /**use App\Http\Controllers\Site\AdController;
    use App\Http\Controllers\Site\CategoryController;
    use App\Http\Controllers\Site\HomeController;
    use App\Http\Controllers\Site\AuthController;
    use App\Http\Controllers\Site\UserController;
    use App\Http\Controllers\Site\NotificationController;
     * @var string
     */
    protected $table = 'categories';

    /**
     * @var array
     */
    protected $fillable = [
        'id','name_ar','name_en', 'slug', 'description_ar', 'description_en','parent_id', 'featured', 'menu', 'image','color','usage_ar','sort'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'parent_id' =>  'integer',
        'featured'  =>  'boolean',
        'menu'      =>  'boolean'
    ];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name_en'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    }

    public function getImageAttribute(){
        return url('storage/categories').'/'.$this->attributes['image'];
    }


    public function getNameAttribute(){
        $name = 'name_'.app()->getLocale();
        return $this->$name;
    }

    public function getDescAttribute(){
        $desc = 'description_'.app()->getLocale();
        return $this->$desc;
    }
    
    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class,'category_id');
    }
    
     public function categoryTerms()
    {
        return $this->hasMany(CategoryTerm::class,'category_id');
    }
    public function sub()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
}
