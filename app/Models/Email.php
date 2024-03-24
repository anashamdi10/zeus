<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Email extends Model
{
    use HasFactory;
    protected $table = "emails";
    protected $fillable = ['id', 'email', 'created_at'];

    public static function getAllEmails(){
        $result = DB::table('emails')->select('id', 'email')->orderby('id', 'ASC')->get()->toArray();

        return $result;
    }
}
