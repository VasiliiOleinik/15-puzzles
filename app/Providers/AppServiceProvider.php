<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {        
        //Если мы на странице подтверждения почты, то вставляем кастомное письмо
        if (\Request::is('email*')) {
            VerifyEmail::toMailUsing(function ($notifiable) {
                $verifyUrl = URL::temporarySignedRoute(
                    'verification.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
                );

                return (new MailMessage)
                    ->subject(__('app.name').' - '.__('verify.subject'))
                    ->markdown('vendor.notifications.emails', ['actionUrl' => $verifyUrl]);
            });
        }
    }

    
}
