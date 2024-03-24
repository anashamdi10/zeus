<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOptionValue extends Model
{

    protected $hidden = ['created_at','updated_at'];
    protected $table = 'product_options_values';
    public $timestamps = true;
    protected $fillable = array('product_id','product_option_id','option_id','option_value_id','quantity','subtract','price','price_prefix','points','points_prefix','weight','weight_prefix','image');

   

/**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
    
    public function option_value()
    {
        return $this->belongsTo(OptionValue::class);
    }

}









