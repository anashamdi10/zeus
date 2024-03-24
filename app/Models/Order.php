<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = ['id', 'product_name', 'product_code', 'name', 'email', 'mobile', 'quantity', 'notes', 'created_at' , 'updated_at'];

}
