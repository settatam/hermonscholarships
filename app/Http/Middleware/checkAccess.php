<?php

namespace App\Http\Middleware;

use Closure;

class checkAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
	     $user = $request->user();
		     //if no user is logged in go to loggin
			 
			 //allow to see the admin page
		      if ( !$user ) {
		
				  return redirect('/admin/login');
		       }  
			 
			 if ( $user ) {
				if ($user && $user->is_admin == false) { 
			  
				  return redirect('errors/404');
				}
			 }
		 
		  return $next($request);
     }
}
