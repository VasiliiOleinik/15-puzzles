<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use App\Models\User\User;
use App\Repositories\UserRepository;
use App\Service\Properties;
use App\Service\VerificationService;
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

    private  $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, VerificationService $service)
    {
        if ($request->cookie('locale') == null) {
            $locale = 'eng';
        } else {
            $locale = $request->cookie('locale');
        }
        Config::set('app.locale', $locale);
        App::setLocale($locale);
        $this->service = $service;
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

    public function confirmEmail(Request  $request)
    {
        $user = User::find($request->id);
        if($user->hash == $request->hash){
            $user->update([
                'email_verified_at' => now()
            ]);

            return redirect(app()->getLocale() . '/personal_cabinet');
        }
    }

    public function resend(Request $request)
    {
        $link = $this->service->getLink($request, $request->user());
        \Mail::to($request->user())
            ->send(new VerificationEmail($link));

        return back();
    }

}
