<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SocialNetwork extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('social', function () {
            return \App\Models\SocialNetwork::all();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
