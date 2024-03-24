<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{

    protected $hidden = ['created_at','updated_at'];
    protected $table = 'user_addresses';
    public $timestamps = true;
    protected $fillable = array('user_id','first_name','last_name','mobile','address','default','city_id');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }



}









