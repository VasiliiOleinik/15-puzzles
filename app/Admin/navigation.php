<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

return [
   /* [
        'title' => 'Dashboard',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
    ],

    [
        'title' => 'Information',
        'icon'  => 'fa fa-exclamation-circle',
        'url'   => route('admin.information'),
    ],

    [
        'title' => 'Permissions',
        'icon' => 'fa fa-group',
        'pages' => [
            (new Page(\App\Models\User\User::class))
                ->setIcon('fa fa-user')
                ->setPriority(0),
            (new Page(\App\Models\Role\Role::class))
                ->setIcon('fa fa-group')
                ->setPriority(100)
        ]
    ],*/

    [
        'title' => 'Настройки',
        'icon'  => 'fa fa-cog',
        'url'   => url('/admin/options'),
    ],

     [
        'title' => 'Страницы',
        'icon'  => 'fa fa-book',
        'url'   => url('/admin/pages'),
        'pages' => [
            [
                'title' => 'Главная',
                'icon'  => 'fa fa-home',
                'url'   => url('/admin/pages/main'),
            ],
            [
                'title' => 'Истории болезней',
                'icon'  => 'fa fa-address-card',
                //'url'   => url('/admin/pages/member-cases'),
                'url'   => url('/admin/member-cases'),                
            ],
            [
                'title' => 'Диаграмма факторов',
                'icon'  => 'fa fa-retweet',
                'url'   => url('/admin/pages/factor-diagram'),
            ],
            [
                'title' => 'О нас',
                'icon'  => 'fa fa-id-card',
                'url'   => url('/admin/pages/about'),
            ],
            [
                'title' => 'Новости',
                'icon'  => 'fa fa-comment',
                'url'   => url('/admin/news'),
            ],
            [
                'title' => 'Литература',
                'icon'  => 'fa fa-graduation-cap',
                'url'   => url('/admin/literature'),
            ],
            [
                'title' => 'FAQ',
                'icon'  => 'fa fa-question',
                'url'   => url('/admin/pages/faq'),
            ],
        ]
    ],
   

    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fa fa-user')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
];
