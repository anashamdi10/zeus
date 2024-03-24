<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Notification extends Model
{
    protected $guarded=['id'];
    // protected $with=['country'];

    protected $fillable = [
        'title_ar','title_en', 'description_ar', 'description_en','user_id','is_seen','object_id'
    ];

    public function getDescriptionAttribute()
    {
        $name = "description_".app()->getLocale();
        return $this->$name;
    }

    public function getTitleAttribute()
    {
        $title = "title_".app()->getLocale();
        return $this->$title;
    }
    
    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
}
