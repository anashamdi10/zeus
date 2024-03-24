<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'video_slider';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'video', 'created_at', 'updated_at'
    ];
}
