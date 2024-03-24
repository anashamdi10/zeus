<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
     protected $hidden = ['created_at','updated_at'];
    protected $fillable=['user_id','product_id'];
    // protected $with=['product'];
    


    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    
}
