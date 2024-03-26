<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhyController extends Controller
{
    public function index(Request $request)
    {
        $data = Slider::select("id", "title", "sub_title", "link")->get();
        $video = Video::all()->toArray();

        return view('admin.slide.index', ['data' => $data, 'video' => $video]);
    }
}
