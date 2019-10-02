<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [     
        \App\Models\User\User::class => 'App\Http\Admin\Users',
        \App\Models\Role\Role::class => 'App\Http\Admin\Roles',
        \App\Models\MemberCase::class => 'App\Http\Admin\MemberCases',
        \App\Models\Comment::class => 'App\Http\Admin\Comments',

        \App\Models\Factor\FactorLanguage::class => 'App\Http\Admin\FactorLanguages',
        \App\Models\Disease\DiseaseLanguage::class => 'App\Http\Admin\DiseaseLanguages',
        \App\Models\Protocol\ProtocolLanguage::class => 'App\Http\Admin\ProtocolLanguages',
        \App\Models\RemedyLanguage::class => 'App\Http\Admin\RemedyLanguages',
        \App\Models\Marker\MarkerLanguage::class => 'App\Http\Admin\MarkerLanguages',

        \App\Models\Article\ArticleLanguage::class => 'App\Http\Admin\ArticleLanguages',
        \App\Models\Book\BookLanguage::class => 'App\Http\Admin\BookLanguages',
        \App\Models\QuestionLanguage::class => 'App\Http\Admin\QuestionLanguages',
        \App\Models\Book\LinkForBooks::class => 'App\Http\Admin\LinkForBooks',
        \App\Models\MethodLanguage::class => 'App\Http\Admin\MethodLanguages',
        \App\Models\TagLanguage::class => 'App\Http\Admin\TagLanguages',
        \App\Models\Subscriber::class => 'App\Http\Admin\Subscribers',
        \App\Models\Category\CategoryForNewsLanguage::class => 'App\Http\Admin\CategoryForNewsLanguages',
        \App\Models\Category\CategoryForBooksLanguage::class => 'App\Http\Admin\CategoryForBooksLanguages',
        \App\Models\Page::class => 'App\Http\Admin\Page',
        \App\Models\Options::class => 'App\Http\Admin\Options',
        \App\Models\Article\Article::class => 'App\Http\Admin\Article',
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
        parent::boot($admin);
    }
}
