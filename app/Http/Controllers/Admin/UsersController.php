<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Mail\DailyEmail as DailyEmail;
use App\User;
use Mail;

class UsersController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return View("admin.users.index", ["users"=>$users]);
    }

    public function testEmail($id) {
        $user = User::find($id);
        $user->sendEmail();
        return Redirect("admin/users")->with('message', 'Email is on its way');
    }
}
