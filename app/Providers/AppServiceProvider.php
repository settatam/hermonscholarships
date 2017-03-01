<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Schema;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		//$tables = \DB::select('SHOW TABLES');
		$number_of_students = Student::count();
	
		 $number_of_users = User::count();
		 \View::share('number_of_users', $number_of_users);				  
	    \View::share('number_of_students', $number_of_students);
		
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
