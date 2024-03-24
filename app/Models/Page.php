<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //    protected $guarded=['id'];

    //    protected function my_slug($string, $separator = '-')
    //     {
    //         if (is_null($string)) {
    //             return "";
    //         }
    //         $string = trim($string);
    //         $string = mb_strtolower($string, "UTF-8");;
    //         $string = preg_replace("/[^a-z0-9_\s\-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);
    //         // Remove multiple dashes or whitespaces
    //         $string = preg_replace("/[\s-]+/", " ", $string);
    //         $string = preg_replace("/[\s_]/", $separator, $string);
    //         return $string;
    //     }

    //     public function setKeywordsAttribute($value)
    //     {
    //         $value=$this->my_slug($value);
    //         $this->attributes['keywords'] = $value;
    //     }
    //     public function getImageAttribute(){
    //         if(Route::currentRouteName()=='page.show'){
    //             return url('/public/storage').'/'.$this->attributes['image'];
    //         }else{
    //             return $this->attributes['image'];
    //         }
    //      }


    //      public function setTitleArAttribute($value)
    //     {
    //         $this->attributes['name_ar'] = $value;
    //         $this->attributes['slug'] = Str::slug($value);
    //     }

    protected $table = "pages";
    protected $fillable = [
        'id', 'name_ar', 'name_en', 'description_ar', 'description_en', 'created_at', 'updated_at'
    ];


}
