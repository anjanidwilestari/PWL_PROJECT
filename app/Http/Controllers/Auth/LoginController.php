<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo(){
        if(Auth()->user()->role == "Admin"){
            return route('admin.home');
        } 
        else if(Auth()->user()->role == "Member"){
            return route('member.home');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth()->attempt(array('username'=>$input['username'], 'password'=>$input['password']))){
            if(Auth()->user()->role == "Admin"){
                return redirect()->route('admin.home');
            }
            else if(Auth()->user()->role == "Member"){
                return redirect()->route('member.home');
            }
        } else {
            return redirect()->route('login')->with('error', 'Login failed!');
        }
    }
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
