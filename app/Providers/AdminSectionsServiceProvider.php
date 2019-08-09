<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        //\App\User::class => 'App\Http\Sections\Users',        
        //\App\Models\User\User::class => 'App\Http\Admin\Users',
        \App\Models\MemberCase::class => 'App\Http\Admin\MemberCases',
        \App\Models\Comment::class => 'App\Http\Admin\Comments',
        \App\Models\Factor\FactorLanguage::class => 'App\Http\Admin\FactorLanguages',
        \App\Models\Disease\DiseaseLanguage::class => 'App\Http\Admin\DiseaseLanguages',
        \App\Models\Protocol\ProtocolLanguage::class => 'App\Http\Admin\ProtocolLanguages',
        \App\Models\RemedyLanguage::class => 'App\Http\Admin\RemedyLanguages',
        \App\Models\Marker\MarkerLanguage::class => 'App\Http\Admin\MarkerLanguages',
        //\App\Models\Role\Role::class => 'App\Http\Admin\Roles',
    ];

    //protected $router->get('/factorLanguages/create', ['as' => 'admin.factorLanguages.create', 'uses' => '\App\Http\Controllers\MainController@index']);

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
