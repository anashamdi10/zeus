<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use app\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        
        // $data = Services::select("id", "title", "pragraph_en")->get();

        return view('admin.our_services.index');
    }

    public function create(){
        return view('admin.our_services.create');
    }
}
