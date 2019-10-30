<?php

namespace App\Providers;

use App\Models\Police\Police;
use App\Models\Police\PoliceLanguage;
use Illuminate\Support\ServiceProvider;

class PagePolisy extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('policeTerms', function () {
            return Police::find(2);
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
