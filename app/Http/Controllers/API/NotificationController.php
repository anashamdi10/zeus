<?php

namespace App\Http\Controllers\API;


use App\Models\Brand;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;

class NotificationController extends BaseController
{

    public function index(){
        $local=app()->getLocale();
        $notifications = Notification::where('user_id',auth()->user()->id)->select('id','title_'.$local.' as name','description_'.$local.' as desc','created_at')->get();
        return response()->json(['notifications'=>$notifications,'success'=>true],200);
    }

}
