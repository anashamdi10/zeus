<?php

namespace App\Models;

use Config;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * @var string
     */
    protected $table = 'settings';

    /**
     * @var array
     */
    protected $fillable = ['name_ar','name_en','description_ar','description_en','phone', 'email','facebook','whatsapp','twitter','instagram','snapchat','telegram','tax','logo'];

    /**
     * @param $key
     */
    public static function get($key)
    {
        $setting = new self();
        $entry = $setting->where('key', $key)->first();
        if (!$entry) {
            return;
        }
        return $entry->value;
    }

    /**
     * @param $key
     * @param null $value
     * @return bool
     */
    public static function set($key, $value = null)
    {
        $setting = new self();
        $entry = $setting->where('key', $key)->firstOrFail();
        $entry->value = $value;
        $entry->saveOrFail();
        Config::set('key', $value);
        if (Config::get($key) == $value) {
            return true;
        }
        return false;
    }
    
    public function getNameAttribute(){
        $name = 'name_'.app()->getLocale();
        return $this->$name;
    }

    public function getDescAttribute(){
        $desc = 'description_'.app()->getLocale();
        return $this->$desc;
    }
    
    public function getLogoAttribute(){
        return url('storage/settings').'/'.$this->attributes['logo'];
    }
}
