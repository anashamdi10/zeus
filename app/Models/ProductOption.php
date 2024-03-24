<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{

    protected $hidden = ['created_at','updated_at'];
    protected $table = 'product_options';
    public $timestamps = true;
    protected $fillable = array('option_id','product_id','required');

    public function getTitleAttribute()
    {
        $name = "name_".app()->getLocale();
        return $this->$name;
    }


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
    
    public function product_option_values(){
        return $this->hasMany(ProductOptionValue::class);
    }



}









