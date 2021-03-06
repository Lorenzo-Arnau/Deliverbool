<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('homepage');
});

Route::get('/chartjs', function () {
    return view('chart-js');
});

Route::get('/braintree', function () {
    return view('braintree');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/payment/make', 'PaymentsController@make')->name('payment.make');
