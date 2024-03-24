<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReqItem extends Model
{
    protected $table = 'request_items';
    protected  $with=['product'];

    protected $fillable = [
        'req_id', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
