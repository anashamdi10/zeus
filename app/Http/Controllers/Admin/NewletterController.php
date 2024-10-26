<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Email;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Exports\NewsletterExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

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

    public function ContactUsStore(Request $request){


        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['updated_at'] = null;
        
        $finish = Contact::create($data);

        if ($finish) {
            Session::flash('success', 'تمت الاضافة بنجاح');
           
        } else {
            Session::flash('error', 'حدث خطأ ما ');
            
        }

         return redirect()->route('route.name');;

        
    }
}
