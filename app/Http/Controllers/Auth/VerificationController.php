<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        if($request->cookie('locale') == null){
            $locale = 'eng';
        }else{
            $locale = $request->cookie('locale');
        }
        Config::set('app.locale', $locale);
        App::setLocale($locale);
        
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');        
    }

   public function show()
    {      
        return redirect()->route('verification.notice.locale', app()->getLocale());
    }

    public function showLocale()
    {
        return view('auth.verify');
    }

    public function redirectTo()
    {
        return app()->getLocale() . '/personal_cabinet';
    }
}
