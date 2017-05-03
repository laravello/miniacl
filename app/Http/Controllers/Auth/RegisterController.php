<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

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
    protected $redirectTo = '/verification';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
event(new Registered($user = $this->create($request->all())));
        return redirect('/verification');

        //event(new Registered($user = $this->create($request->all())));
        /*

        

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
                        */
    }

    public function verification()
    {
       
        return view('auth.verification');
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
            'username' => 'required|string|min:4|unique:users|different:email',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        $confirmation_code = str_random(30);
        $data['confirmation_code'] = $confirmation_code;

        /*Mail::send('email.de.verify', $confirmation_code, function($message) {
            $message->to($data['email'], $data['username'])
                ->subject('Verify your email address');
        });*/

        Mail::send('emails.'.\App::getLocale().'.verify', $data, function($message)
{
    $message->to(Input::get('email'), Input::get('username'))->subject('Verify your email address');
});

        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'confirmation_code' => $confirmation_code,
            'password' => bcrypt($data['password']),
        ]);



    }

    public function confirm($confirmation_code)
    {
       // echo $confirmation_code;exit();
        if( ! $confirmation_code)
        {
            return redirect()->route('login')->with('status', __('acl.confirmation_code_missing'));
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            return redirect()->route('login')->with('status', __('acl.confirmation_code_wrong'));
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        //Flash::message('You have successfully verified your account.');
       

        return redirect()->route('login')->with('status', __('acl.login_success'));
    }
}
