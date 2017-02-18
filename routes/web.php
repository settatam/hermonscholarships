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

Route::get('/',  'HomeController@index');

Route::get('/admin',            'Admin\HomeController@index');
Route::get('/admin/students',   'Admin\Students\StudentsController@index');
Route::get('/admin/users',      'Admin\HomeController@index');
Route::get('/admin/test',      'Admin\HomeController@index');
Route::get('/admin/login',      'Auth\LoginController@showLoginForm');
Route::get('/admin/register',   'Auth\RegisterController@showRegistrationForm');
Route::post('/admin/login',      'Auth\LoginController@login');
Route::post('/admin/logout',     'Auth\LoginController@logout');

Route::post('/admin/register',   'Auth\RegisterController@register');

Route::get('/admin/new/students',  'Admin\Students\StudentsController@create');
Route::post('/admin/new/students',  'Admin\Students\StudentsController@create');
Route::get('/admin/view/students/{student_id}','Admin\Students\StudentsController@show');
Route::get('/admin/delete/students/{student_id}','Admin\Students\StudentsController@remove');
Route::get('/admin/edit/students/{student_id}','Admin\Students\StudentsController@edit');
Route::post('/admin/edit/students/{student_id}','Admin\Students\StudentsController@edit');
Route::get('/admin/reports/students/{student_id}','Admin\Reports\ReportController@create');
Route::post('/admin/reports/students/{student_id}','Admin\Reports\ReportController@create');
Route::get('/admin/delete/reports/{report_id}','Admin\Reports\ReportController@delete');
Route::get('/errors/503','ErrorsController@index');

Auth::routes();

Route::get('/view/{id}', 'ViewController@index');

Route::get('/fund', 'EducateController@index');
Route::get('/universal-fund', 'UniversalFundController@index');
Route::get('/recurring-payment', 'UniversalFundController@recurringpayment');
Route::get('/account',           'AccountController@index');
Route::get('/changepassword',    'AccountController@chp');
Route::get('/address',           'AccountController@address');
Route::get('/donations',         'AccountController@donations');
