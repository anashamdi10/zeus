<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class CategoryTerm extends Model
{
    /**
     * @var string
     */
    protected $table = 'category_terms';

    /**
     * @var array
     */
    protected $fillable = ['category_id', 'content_ar', 'content_en'];

    /**
     * @param $value
     */
     
     
      public function getContentAttribute(){
        $name = 'content_'.app()->getLocale();
        return $this->$name;
    }

}
