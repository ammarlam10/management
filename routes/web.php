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

use App\design;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
  return view('welcome');
});
Route::get('/orderform', function () {

    $parties = DB::table('parties')
        ->orderBy('name', 'asc')
        ->get();
    $stock= Design::all();
    return view('order.create', compact('parties','stock'));
});


Route::get('/order/{$id}','OrderController@order' );

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('/party','PartyController');
Route::resource('/design','DesignController');
Route::resource('/order','OrderController');
Route::resource('/report','ReportController');

Route::get('/order/report/{id}', function ($id) {
    $orders = \App\Sales_order::findOrFail($id);
	//$pdf = App::make('dompdf.wrapper');
    //$pdf->loadView('reports.order',compact('orders'));
    //return $pdf->stream();
	return view('reports.order',compact('orders'));
	})->name('order')
   ->middleware('auth');
