<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Auth;
use App\Models\User\User;

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

    use AuthenticatesUsers {
        logout as performLogout;
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

    public function login(Request $request)
    {
        $this->validate($request, [
           'login'           => 'required|max:255',
            'password'           => 'required',
        ],[
            'login.required' => trans('login.login_required'),
            'login.max' => trans('login.login_max'),
            'password.required' => trans('login.password_required'),
        ]);
        if (Auth::attempt(['email' => $request->login, 'password' => $request->password])) {
            // Success
            return json_encode(["auth"=>"success"]);//redirect()->intended();
        } else {
            // Go back on error (or do what you want)
            return json_encode(array('auth'=>'failed'));//redirect()->back();
        }

    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect('/');
    }

    public function redirectTo()
    {
        return app()->getLocale() . '/personal_cabinet';
    }

}
