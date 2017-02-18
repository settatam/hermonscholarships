<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {   
	
	     if (  $request->is ('admin/*') ) { 
	          $this->middleware('checkAccess');
	      }
    }
	
	
	/**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {  
	    if (  $request->is ('admin/*') ) { 
	          return view('admin.auth.register');
	    }
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {   
	
	  
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
		
        if (  $request->is ('admin/*') ) {
			 
		} else { 
		     $this->guard()->login($user);

		}

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
    
	
	/**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
		if (  $request->is('admin/*') ) { 
	          return redirect()->back()->with('status','Registration was successfull');
	    }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {    
	
	      $request = new Request;
		  
		  $user   = new User;
		//The registration is from admin
	     if ( isset($data['submit'] )){
		 
		    $user->fullname = $data['fullname'];
			$user->email=$data['email'];
			$user->password = bcrypt($data['password']);
			$user->is_admin  = true;
			$user->save();
			
			return $user;
		}  
        return User::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
			'is_admin' =>false
        ]);
    }
}
