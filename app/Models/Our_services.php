<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Our_services extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = "our_services";

    /**
     * @var array
     */
    protected $fillable = [
        "id", "title_en", "title_ar", "pragraph_ar", "pragraph_en", "image"
    ];
}
