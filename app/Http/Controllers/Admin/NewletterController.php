<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NewsletterExport;
use Session;
class NewletterController extends Controller
{
    public function index(){
        $data = Email::select("id", "email")->orderby('id', 'ASC')->get();
        return view('admin.newsletter.index', ['data' => $data]);
        
    }
    public function store(Request $request){

    
        $checkExists_email = get_cols_where_row(new Email(), array("id"), array('email' => $request->email));
        
        if($checkExists_email){
            return redirect()->back()->with(['errors' => 'Email is exists before']);
        }
        $data['email'] = $request->email;
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = null;
        
        $finish = Email::create($data);

        if ($finish) {
            Session::flash('success', 'تمت الاضافة بنجاح');
            return redirect()->back();
        } else {
            Session::flash('error', 'حدث خطأ ما ');
            return redirect()->back();
        }

        
    }

    public function exportToExcel(){
        return Excel::download(new NewsletterExport , 'Newletter.xlsx');
    }
}
