<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use App\User;
use DB;

class JobsController extends Controller
{
    
    public function index() {
        $jobs = DB::table('jobs')->get();
        return View("admin.jobs.index",["jobs"=>$jobs]);
    }

    public function failedIndex() {
        $failed_jobs = DB::table('failed_jobs')->orderBy("id","desc")->get();
        return View("admin.jobs.failed",["jobs"=>$failed_jobs]);
    }
}
