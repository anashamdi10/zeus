<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductCategory extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_categories';

    public $timestamps = false;

    /**
     * @var array
     */
     protected $fillable = [
         'category_id', 'product_id'
     ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
