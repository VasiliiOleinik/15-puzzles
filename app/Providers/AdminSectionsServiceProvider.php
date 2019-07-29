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
        \App\Models\User\User::class => 'App\Http\Admin\Users',
        \App\Models\MemberCase::class => 'App\Http\Admin\MemberCases',
        \App\Models\Comment::class => 'App\Http\Admin\Comments',
        \App\Models\Factor\Factor::class => 'App\Http\Admin\Factors',
        \App\Models\Role\Role::class => 'App\Http\Admin\Roles',
    ];

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
