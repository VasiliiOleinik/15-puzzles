<?php

namespace App\Http\Controllers\Auth;

use App\Models\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = 'personal_cabinet';

    /*protected function redirectTo()
    {
        return url()->previous();
    }*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'nickname' => ['required', 'unique:users', 'string', 'max:191', "regex:/^([0-9\p{Latin}]+[\ -]?)+[a-zA-Z0-9]+$/u"],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password-register' => ['required', 'string', 'min:8', "regex:/^([0-9\p{Latin}]+[\ -]?)+[a-zA-Z0-9]+$/u"],
            'confirm-password-register' => ['max:191', 'same:password-register'],
        ]);
    }


    public function register(Request $request)
    {
        $validation = $this->validator($request->all());
        if ($validation->fails())  {
            return response()->json(["errorsRegister" => $validation->errors()->toArray()]);
        }
        else{
           $user = $this->create($request->all());           
           Auth::login($user);
           $user->sendEmailVerificationNotification();
           return json_encode("success");
            
        }
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password-register']),
        ]);
    }
}
