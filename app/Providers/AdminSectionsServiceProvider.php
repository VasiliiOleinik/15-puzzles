<?php

namespace App\Providers;

use App\Models\Book\Book;
use App\Models\Laboratory\Laboratory;
use App\Models\Question;
use App\Models\Tag;
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
        \App\Models\Factor\Factor::class => 'App\Http\Admin\Factor',
        \App\Models\Disease\Disease::class => 'App\Http\Admin\Diseases',
        \App\Models\Protocol\Protocol::class => 'App\Http\Admin\Protocol',
        \App\Models\Remedy::class => 'App\Http\Admin\Remedy',
        \App\Models\Marker\Marker::class => 'App\Http\Admin\Marker',
        \App\Models\Method::class => 'App\Http\Admin\Method',
        \App\Models\Subscriber::class => 'App\Http\Admin\Subscribers',
        \App\Models\Page::class => 'App\Http\Admin\Page',
        \App\Models\Options::class => 'App\Http\Admin\Options',
        \App\Models\Article\Article::class => 'App\Http\Admin\Article',
        \App\Models\Organ::class => 'App\Http\Admin\Organ',
        \App\Models\Category\CategoryForNews::class => 'App\Http\Admin\CategoryForNews',
        Book::class => 'App\Http\Admin\Book',
        \App\Models\Category\CategoryForBooks::class => 'App\Http\Admin\CategoryForBooks',
        Laboratory::class=>'App\Http\Admin\Laboratory',
        Question::class=>'App\Http\Admin\Question',
        Tag::class=>'App\Http\Admin\Tag',
        \App\Models\Book\LinkForBooks::class => 'App\Http\Admin\LinkForBooks',
        \App\Models\Factor\FactorDiagram::class => 'App\Http\Admin\FactorDiagram',
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
