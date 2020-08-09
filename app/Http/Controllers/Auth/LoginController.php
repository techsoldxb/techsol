<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admin';

    public function authenticated($request , $user){
        if($user->user_type=='guest'){
            return redirect()->route('homeicc') ;
        }elseif($user->user_type=='admin'){
            return redirect()->route('home') ;
        }elseif($user->user_type=='user'){
            return redirect()->route('home') ;
        }
        elseif($user->user_type=='service'){
            return redirect()->route('home') ;
        }
        elseif($user->user_type=='super_user'){
            return redirect()->route('home') ;
        }
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

  

}
