<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Redirect;

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

    protected $decayMinutes = 30;
    
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

    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            //return redirect('/login')->withErrors(array('error' => 'Your account has been disabled because of too many wrong attempts. Retry in '. $this->decayMinutes.' minutes'));
            toastr()->error('Your account has been disabled because of too many wrong attempts');

            return Redirect::route('login')->with(['message' => 'Your account has been disabled because of too many wrong attempts. Retry in '. $this->decayMinutes.' minutes', 'alert-class' => 'alert-danger']);

       }
       $this->incrementLoginAttempts($request);

   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
           // dd(auth()->user()->sha_user);

            if (auth()->user()->admin == 1) {
                return redirect()->route('admin.home');
            }else if (auth()->user()->sha_user == 1) {
                return redirect()->route('sha.home');
            }else if (auth()->user()->isa_user == 1) {
                return redirect()->route('isa.home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }

}
