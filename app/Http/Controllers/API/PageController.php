<?php

namespace App\Http\Controllers\API;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function page($id)
    {
        $local=app()->getLocale();
         $page=Page::select('id','name_'.$local.' as name','description_'.$local.' as description')->where('id',$id)->first();
       return response()->json(['success'=>'true','data'=>$page,'message'=>'success in geting data'],200);
    }
}
