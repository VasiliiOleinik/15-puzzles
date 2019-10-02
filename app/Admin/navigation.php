<?php

use SleepingOwl\Admin\Navigation\Page;
use App\Models\Article\Article;

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
        'title'=>'Хелперы',
        'icon'  => 'fa fa-book',
        'pages'=>[
            (new Page(\App\Models\Options::class))->setTitle('Опции')
        ]

    ],

    [
        'title' => 'Страницы',
        'icon'  => 'fa fa-book',
        'pages' => [
                (new Page(\App\Models\Page::class))->setTitle('Страницы')
        ]
    ],

    [
        'title' => 'Новости',
        'icon'  => 'fa fa-comment',
        'pages' => [
                (new Page(Article::class))->setTitle('Статьи')

        ],
    ],

    [
        'title' => 'Литература',
        'icon'  => 'fa fa-graduation-cap',
        'url'   => url('/admin/pages'),
        'pages' => [
            [
                'title' => 'Литература',
                'icon'  => 'fa fa-graduation-cap',
                'url'   => url('/admin/literature'),
                //'badge' => \App\Models\Book\Book::count(),
            ],
            [
                'title' => 'Литература SEO',
                'icon'  => 'fa fa-graduation-cap',
                'url'   => url('/admin/pages/literature'),
                //'badge' => \App\Models\Book\Book::count(),
            ],
            [
                'title' => 'Ссылки на магазин',
                'icon'  => 'fa fa-shopping-cart',
                'url'   => url('/admin/shops'),
                //'badge' => \App\Models\Book\LinkForBooks::count(),
            ],
        ]
    ],

    [
        'title' => 'Истории болезней',
        'icon'  => 'fa fa-address-card',
        'url'   => url('/admin/pages'),
        'pages' => [
            [
                'title' => 'Истории болезней',
                'icon'  => 'fa fa-address-card',
                'url'   => url('/admin/member-cases'),
                //'badge' => \App\Models\MemberCase::count(),
            ],
            [
                'title' => 'Истории болезней SEO',
                'icon'  => 'fa fa-address-card',
                'url'   => url('/admin/pages/member-cases'),
                //'badge' => \App\Models\MemberCase::count(),
            ],
        ],
    ],

    [
        'title' => 'FAQ',
        'icon'  => 'fa fa-question',
        'url'   => url('/admin/pages'),
        'pages' => [
            [
                'title' => 'FAQ',
                'icon'  => 'fa fa-question',
                'url'   => url('/admin/faq'),
                //'badge' => \App\Models\Question::count(),
            ],
            [
                'title' => 'FAQ SEO',
                'icon'  => 'fa fa-question',
                'url'   => url('/admin/pages/faq'),
                //'badge' => \App\Models\Question::count(),
            ],
        ],
    ],

    [
        'title' => 'Пользователи',
        'icon'  => 'fa fa-male',
        'url'   => url('/admin/pages'),
        'pages' => [
            [
                'title' => 'Пользователи',
                'icon'  => 'fa fa-user',
                'url'   => url('/admin/users'),
                //'badge' => \App\Models\User\User::count(),
            ],
            [
                'title' => 'Роли',
                'icon'  => 'fa fa-user-circle',
                'url'   => url('/admin/roles'),
                //'badge' => \App\Models\Role\Role::count(),
            ],
             [
                'title' => 'Подписчики',
                'icon'  => 'fa fa-user-plus',
                'url'   => url('/admin/subscribers'),
                //'badge' => \App\Models\Subscriber::count(),
            ],
            [
                'title' => 'Комментарии',
                'icon'  => 'fa fa-comments',
                'url'   => url('/admin/comments'),
                //'badge' => \App\Models\Comment::count(),
            ],           
        ]
    ],

    [
        'title' => 'Пазл',
        'icon'  => 'fa fa-puzzle-piece',
        'url'   => url('/admin/pages'),
        'pages' => [
            [
                'title' => 'Факторы',
                'icon'  => 'fa fa-retweet',
                'url'   => url('/admin/factors'),
                //'badge' => \App\Models\Factor\Factor::count(),
            ],
            [
                'title' => 'Болезни',
                'icon'  => 'fa fa-stethoscope',
                'url'   => url('/admin/diseases'),
                //'badge' => \App\Models\Disease\Disease::count(),
            ],
            [
                'title' => 'Протоколы',
                'icon'  => 'fa fa-file',
                'url'   => url('/admin/protocols'),
                //'badge' => \App\Models\Protocol\Protocol::count(),
            ],
            [
                'title' => 'Лекарства',
                'icon'  => 'fa fa-stumbleupon-circle',
                'url'   => url('/admin/remedies'),
                //'badge' => \App\Models\Remedy::count(),
            ],
            [
                'title' => 'Анализы',
                'icon'  => 'fa fa-flask',
                'url'   => url('/admin/pages'),
                'pages' => [
                    [
                        'title' => 'Анализы',
                        'icon'  => 'fa fa-thermometer',
                        'url'   => url('/admin/markers'),
                        //'badge' => \App\Models\Marker\Marker::count(),
                    ],
                    [
                        'title' => 'Методы',
                        'icon'  => 'fa fa-compass',
                        'url'   => url('/admin/methods'),
                        //'badge' => \App\Models\Method::count(),
                    ],
                ],
            ],
        ],
    ],

    [
        'title' => 'Категории',
        'icon'  => 'fa fa-question',
        'url'   => url('/admin/pages'),
        'pages' => [
            [
                'title' => 'Категории новостей',
                'icon'  => 'fa fa-question',
                'url'   => url('/admin/news_categories'),
                //'badge' => \App\Models\Question::count(),
            ],
            [
                'title' => 'Категории книг',
                'icon'  => 'fa fa-question',
                'url'   => url('/admin/book_categories'),
                //'badge' => \App\Models\Question::count(),
            ],
        ],
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
