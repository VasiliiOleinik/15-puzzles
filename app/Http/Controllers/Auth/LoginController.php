<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/personal_cabinet';

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
        //dd($request->all());
        $this->validate($request, [
            'login'           => 'required|max:255',
            'password'           => 'required',
        ]);
        //dd(Auth::attempt(['nickname' => $request->login, 'password' => $request->password]));
        if (Auth::attempt(['nickname' => $request->login, 'password' => $request->password])) {
            // Success
            return json_encode(array("auth"=>"success"));//redirect()->intended();
        } else {
            // Go back on error (or do what you want)
            return json_encode(array('auth'=>'failed'));//redirect()->back();
        }

    }

}
