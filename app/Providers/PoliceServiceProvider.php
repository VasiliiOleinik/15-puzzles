<?php

namespace App\Providers;

use App\Models\Police\PoliceLanguage;
use Illuminate\Support\ServiceProvider;

class PoliceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('police', function () {
            return PoliceLanguage::with('police')->get();
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
