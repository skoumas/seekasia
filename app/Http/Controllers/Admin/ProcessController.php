<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use App\User;
use DB;
use Artisan;

class ProcessController extends Controller
{
    
    public function index() {
        $exitCode = Artisan::call('dailycheck');
        return Redirect("admin/")->with('message', 'Daily Check script started');
    }
}
