<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/index';

    
    public function login(){
        return view('auth.login');
    }
    public function dologin(Request $request){
        $findUser = User::where('enternum',$request->enternum)->first();

        if($findUser){
            Auth::login($findUser);
        } else {            
            return redirect('/login')->with('error','מספר זיהוי שגוי');
        }
        return redirect('/index');
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


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();
        $findUser = User::where('facebook',$userSocial->email)->first();

        if($findUser){
            Auth::login($findUser);
            return redirect('/index');
        }        
        
        return redirect('/login')->with('error','לא נמצא משתמש תואם לכתובת Facebook');
    }


        /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackGoogle()
    {
        $userSocial = Socialite::driver('google')->user();
        $findUser = User::where('gmail',$userSocial->email)->first();

        if($findUser){
            Auth::login($findUser);
            return redirect('/index');
        }        
        
        return redirect('/login')->with('error','לא נמצא משתמש תואם לכתובת Gmail');
    }
}
