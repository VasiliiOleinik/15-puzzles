<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function reset(Request $request){

        $this->validate($request, [
            'password'           => ['required', 'string', 'min:8', "regex:/^([0-9\p{Latin}]+[\ -]?)+[a-zA-Z0-9]+$/u"],
        ]);

        $user = User::where("email","=",$request->email)->first();
        $user->password =  Hash::make($request->password);
        $user->save();

        return redirect(app()->getLocale() . '/personal_cabinet');
    }

    public function redirectTo()
    {
        return app()->getLocale() . '/personal_cabinet';
    }
}

