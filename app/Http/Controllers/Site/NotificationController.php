<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
     public function ajax(){
         $local = app()->getLocale();
        $notification =Notification::where('user_id',auth()->user()->id)->where('is_seen','0')->select('id', 'user_id','title_' . $local . ' as name','description_' . $local . ' as desc', 'is_seen', 'created_at')->take(10)->latest()->get();
        Notification::where('user_id', auth()->user()->id)->update(['is_seen' => '1']);
        return $notification;
    }
}
