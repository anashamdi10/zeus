<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlashDeal extends Model
{

    protected $hidden = ['created_at','updated_at'];
    protected $table = 'flash_deals';
    public $timestamps = true;
    protected $fillable = array('id','product_id','sale_price', 'date_time', 'title', 'pragraph','status','image');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}









