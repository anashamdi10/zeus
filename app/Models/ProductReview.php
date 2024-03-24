<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductReview extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_reviews';

    public $timestamps = false;

    /**
     * @var array
     */
     protected $fillable = [
         'user_id', 'rate','comment','product_id','status'
     ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    

}
