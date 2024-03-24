<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;
    /**
     * @var string
     */
    protected $table = 'counter';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'facilities', 'Porducts', 'Produced_Tons_in_2023' , 'Oustees_Clients'
    ];

}
