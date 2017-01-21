<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    $p = \App\Sales_order::find(1);
    return $p->draft;
//    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
