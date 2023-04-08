<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SocialMediaSection;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
    /**
     * This trait has all the login throttling functionality.
     */
    use ThrottlesLogins;
    /**
     * Max login attempts allowed.
     */
    public $maxAttempts = 5;

    /**
     * Number of minutes to lock the login.
     */
    public $decayMinutes = 3;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $social = SocialMediaSection::first();
        return view('auth.login',[
            'loginRoute' => 'admin.login',
            'forgotPasswordRoute' => 'admin.password.request',
            'social'    => $social
        ]);
    }

    public function login(Request $request)
    {
        $this->validator($request);

        //check if the user has too many login attempts.
        if ($this->hasTooManyLoginAttempts($request)){
            //Fire the lockout event.
            $this->fireLockoutEvent($request);

            //redirect the user back after lockout.
            return $this->sendLockoutResponse($request);
        }
        
        if(Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
            $notification = array(
                'message' => 'You are Logged in as Admin!',
                'alert-type' => 'success'
            );
            return redirect()
                ->intended(route('admin.index'))
                ->with($notification);
        }
          
        //keep track of login attempts from the user.
        $this->incrementLoginAttempts($request);
    
        //Authentication failed...
        return $this->loginFailed();
    }

    public function logout()
    {
        Session::flush();
        Auth::guard('admin')->logout();
        $notification = array(
            'message' => 'Successfully logged out!!',
            'alert-type' => 'success'
        );
        return redirect()
            ->route('admin.login')
            ->with($notification);
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:admins|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }

    /**
     * Username used in ThrottlesLogins trait
     * 
     * @return string
     */
    public function username(){
        return 'email';
    }
}
