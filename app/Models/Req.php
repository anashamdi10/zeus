<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    protected $table = 'requests';

    protected $fillable = [
        'request_number', 'user_id','total','status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(ReqItem::class);
    }
}
