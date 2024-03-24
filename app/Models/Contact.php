<?php

namespace App\Models;

use App\Models\Product;
//use TypiCMS\NestableTrait;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'contacts';

    /**
     * @var array
     */
    protected $fillable = [
        'name','email', 'message','subject'
    ];
    protected $hidden = [
        'created_at','updated_at'
    ];



}
