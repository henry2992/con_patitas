<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function submitData(Request $request){


        $result = Contact::insert(['email'=>$request->email,'contents'=>$request->contents]);
   
        if($result){
            return redirect('/contact')->with('status','Successfully sent.');
        }
        return redirect()->back()->withInput($request->all())->with('status','Something went wrong');
    }
}
