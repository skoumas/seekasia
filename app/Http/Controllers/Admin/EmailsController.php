<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
use App\Email;
 

class EmailsController extends Controller
{
    
    public function index() {
        $emails = Email::orderBy("id","DESC")->get();
        return View("admin.emails.index",["emails"=>$emails]);
    }
    public function indexByUser($id) {
        $emails = Email::where('user_id',$id)->orderBy("id","DESC")->get();
        return View("admin.emails.index",["emails"=>$emails]);
    }

}
