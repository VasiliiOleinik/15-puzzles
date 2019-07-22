<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Notifications\LocaleResetPassword;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

     public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email'), $this->resetNotifier() 
        );

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return response()->json([
                    'success' => true
                ]);

            case Password::INVALID_USER:
            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid user'
                ]);
        }
    }

    // overwritte function resetNotifier() on trait SendsPasswordResetEmails
    protected function resetNotifier()
    {
        return function($token)
        {
            return new LocaleResetPassword($token);
        };
    }

}
