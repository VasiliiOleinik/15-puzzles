<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\SendNewPassword;
use App\Mail\VerificationEmail;
use App\Models\User\User;
use App\Http\Controllers\Controller;
use App\Service\VerificationService;
use Egulias\EmailValidator\Validation\EmailValidation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

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

    /*protected function redirectTo()
    {
        return url()->previous();
    }*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private  $service;
    public function __construct(VerificationService $service)
    {
        $this->middleware('guest');
        $this->service = $service;
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
            'email' => ['required', 'string', 'email:filter', 'max:191', 'unique:users'],
            'password-register' => ['required', 'string', 'min:8', "regex:/^([0-9\p{Latin}]+[\ -]?)+[a-zA-Z0-9]+$/u"],
            'confirm-password-register' => ['max:191', 'same:password-register'],
        ],[
            'nickname.required' => trans('register.nickname_required'),
            'nickname.unique' => trans('register.nickname_unique'),
            'nickname.max' => trans('register.nickname_max'),
            'email.required' => trans('register.email_required'),
            'email.email' => trans('register.email_email'),
            'email.max' => trans('register.email_max'),
            'email.unique' => trans('register.email_unique'),
            'password-register.required' => trans('register.password-register.required'),
            'password-register.min' => trans('register.password-register.min'),
            'confirm-password-register.same' => trans('register.confirm-password-register.same'),
            'confirm-password-register.max' => trans('register.confirm-password-register.max'),
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
           $hash = str_random(9);
           Auth::login($user);
            $user->update([
                'hash'=>$hash
            ]);
            $link = $this->service->getLink($request, $user);
            \Mail::to($user)
                ->send(new VerificationEmail($link));
            //Ema($link, $user)
//           VerifyEmail::toMailUsing(function ($notifiable) {
//                $verifyUrl = URL::temporarySignedRoute(
//                    'verification.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
//                );
////                return (new MailMessage)
////                    ->subject(__('app.name').' - '.__('verify.subject'))
////                    ->markdown('vendor.notifications.emails', ['actionUrl' => $verifyUrl]);
//               'test';
//            });
           //$user->sendEmailVerificationNotification();
           return json_encode(["auth"=>"success"]);
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

    public function redirectTo()
    {
        return app()->getLocale() . '/personal_cabinet';
    }
}
