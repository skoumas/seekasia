<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/cron', 'CronController@cron');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware("admin")->group(function () {
    Route::get('/', 'Admin\HomeController@index');
    Route::get('/jobs', 'Admin\JobsController@index');
    Route::get('/jobs/failed', 'Admin\JobsController@failedIndex');
    Route::get('/users/{id}/test_email', 'Admin\UsersController@testEmail');
    Route::resource('/users', 'Admin\UsersController');
    
    Route::get('/process', 'Admin\ProcessController@index');
});