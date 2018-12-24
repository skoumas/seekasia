<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use App\User;

class HomeController extends Controller
{
    
    public function index()
    {
        
        return View("admin.home");
    }

    
}
