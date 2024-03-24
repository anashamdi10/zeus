<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App;

class PARENT_API extends Controller
{
    public $lang;

    function __construct(Request $request)
    {
        $this->Set_Request_Language($request);
    }

    function Set_Request_Language($request)
    {
        if ($request->header('lang')) {
            if ($request->header('lang') == "ar") {
                $this->lang = "ar";
            } else {
                $this->lang = "en";
            }
        } else {
            $this->lang = "ar";
        }
        App::setLocale($this->lang);
        Carbon::setLocale($this->lang);
    }
}
