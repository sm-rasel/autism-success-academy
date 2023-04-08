<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\SocialMediaSection;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $social = SocialMediaSection::first();
        return view('auth.login',[
            'loginRoute' => 'login',
            'forgotPasswordRoute' => 'password.request',
            'social' => $social
        ]);
    }

    public function logout(){
        Auth::logout();
        $notification = array(
            'message' => 'Successfully logged out!!',
            'alert-type' => 'success'
        );
        return redirect()
            ->route('pages.index')
            ->with($notification);
    }
}
