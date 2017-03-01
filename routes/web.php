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
Route::get('/admin/login',     'Auth\LoginController@showLoginForm');
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
Route::get('/admin/calender/students/{student_id}','Admin\Calender\CalenderController@index');
Route::post('/admin/calender/students/{student_id}','Admin\Calender\CalenderController@create');
Route::get('/admin/calender/{student_id}', 'Admin\Calender\CalenderController@index');
Route::get('/admin/delete/calender/{calender_id}','Admin\Calender\CalenderController@delete');
Route::get('/admin/calender/add/{student_id}','Admin\Calender\CalenderController@create');
Route::post('/admin/calender/add/{student_id}','Admin\Calender\CalenderController@create');
Route::get('/admin/students/add/image/{student_id}','Admin\Images\AdditionalImagesController@index');
Route::get('/admin/students/add/new/image/{student_id}','Admin\Images\AdditionalImagesController@create');
Route::post('/admin/students/add/new/image/{student_id}','Admin\Images\AdditionalImagesController@create');
Route::get('/admin/delete/addimage/{add_image_id}','Admin\Images\AdditionalImagesController@delete');
Route::get('/admin/delete/reports/{report_id}','Admin\Reports\ReportController@delete');
Route::get('/errors/503','ErrorsController@index');

Auth::routes();

Route::get('/view/{id}/{slug}', 'ViewController@index');

Route::get('/fund', 'EducateController@index');
Route::get('/payment/{student_id}', 'FundController@index');
Route::get('/account',           'AccountController@index');
Route::get('/changepassword',    'AccountController@chp');
Route::get('/address',           'AccountController@address');
Route::get('/donations',         'AccountController@donations');
