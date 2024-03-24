<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_images';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'full','type', 'main_full'];

    /**
     * @var array
     */
    protected $casts = [
        'product_id'    =>  'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
//    public function getFullAttribute(){
//            return url('storage/app/public').'/'.$this->attributes['full'];
//    }


    // public function getFullAttribute()
    // {
    //     if (!$this->attributes['full']) {
    //         return url('storage/products/default.png');
    //     }
    //     return url('storage/products/').'/'.$this->attributes['full'];
    // }
}
