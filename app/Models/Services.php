<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
     /**
     * @var string
     */
    protected $table = 'our_services';

    protected $fillable=['id','title_en','title_ar','pragraph_en','pragraph_ar','image'];
}
