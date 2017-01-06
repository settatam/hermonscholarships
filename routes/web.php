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
    return view('index');
});

Auth::routes();

Route::get('/view/{id}', 'ViewController@index');

Route::get('/fund', 'EducateController@index');
Route::get('/universal-fund', 'UniversalFundController@index');
Route::get('/recurring-payment', 'UniversalFundController@recurringpayment');
Route::get('/account',           'AccountController@index');
Route::get('/changepassword',    'AccountController@chp');
Route::get('/address',           'AccountController@address');
Route::get('/donations',         'AccountController@donations');


