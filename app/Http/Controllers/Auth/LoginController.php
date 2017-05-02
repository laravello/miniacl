<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
      /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function Xauthenticated(Request $request, User $user)
    {
       // for a detailed error message use and modify this method without the "X"
        if ($user->confirmed) {
            return redirect()->intended($this->redirectPath());
        } else {
            // Raise exception, or redirect with error saying account is not active
            echo "Noe"; exit();
        }
    }
    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');

        if(config('app.Verification') == true and config('app.Activation') == false)
        {
            return array_add($credentials, 'confirmed', '1');
        }
        if(config('app.Verification') == true and config('app.Activation') == true)
        {
            $credentials = array_add($credentials, 'active', '1');
            return array_add($credentials, 'confirmed', '1');   
        }
        if(config('app.Verification') == false and config('app.Activation') == true)
        {
            return array_add($credentials, 'active', 1);    
        }
        if(config('app.Verification') == false and config('app.Activation') == false)
        {
            return $request->only($this->username(), 'password');   
        }
        
    }

    

    

    



}
