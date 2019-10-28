<?php

use App\Models\Article\Article;
use SleepingOwl\Admin\Navigation\Page;

return [
    (new Page(\App\Models\Page::class))->setTitle('Страницы'),
    [
        'title' => 'Новости',
        'icon' => 'fa fa-comment',
        'pages' => [
            (new Page(Article::class))->setTitle('Список новостей'),
            (new Page(\App\Models\Category\CategoryForNews::class))->setTitle('Категории')
        ],
    ],
    [
        'title' => 'Литература',
        'icon' => 'fa fa-graduation-cap',
        'pages' => [
            (new Page(\App\Models\Book\Book::class))->setTitle('Список литературы'),
            (new Page(\App\Models\Category\CategoryForBooks::class))->setTitle('Категории'),
            (new Page(\App\Models\Book\LinkForBooks::class))->setTitle('Магазины')
        ]
    ],
    [
        'title' => 'Пользователи',
        'icon' => 'fa fa-male',
        'pages' => [
            (new Page(\App\Models\User\User::class))->setTitle('Список пользователей'),
            (new Page(\App\Models\Role\Role::class))->setTitle('Роли'),
        ]
    ],
    [
        'title' => 'История пользователей',
        'icon' => 'fa fa-male',
        'pages' => [
            (new Page(\App\Models\MemberCase::class))->setTitle('Истории'),
            (new Page(\App\Models\Comment::class))->setTitle('Комментарии')
        ]
    ],
    [
        'title' => 'Пазл',
        'icon' => 'fa fa-puzzle-piece',
        'pages' => [
            (new Page(\App\Models\Factor\Factor::class))->setTitle('Факторы'),
            (new Page(\App\Models\Disease\Disease::class))->setTitle('Болезни'),
            (new Page(\App\Models\Protocol\Protocol::class))->setTitle('Протоколы'),
            (new Page(\App\Models\Remedy::class))->setTitle('Лекарства'),
            [
                'title' => 'Анализы',
                'icon' => 'fa fa-flask',
                'pages' => [
                    (new Page(\App\Models\Marker\Marker::class))->setTitle('Анализы'),
                    (new Page(\App\Models\Laboratory\Laboratory::class))->setTitle('Лаборатории'),
                    (new Page(\App\Models\Method::class))->setTitle('Методы'),
                ],
            ],
        ],
    ],
    (new Page(\App\Models\Question::class))->setTitle('FAQ'),
    (new Page(\App\Models\Tag::class))->setTitle('Теги'),
    (new Page(\App\Models\Options::class))->setTitle('Настройки'),
    [
        'title' => 'Факторная диаграмма',
        'pages' => [
            (new Page(\App\Models\NameCols::class))->setTitle('Имя колонок'),
            (new Page(\App\Models\Factor\FactorDiagram::class))->setTitle('Факторная диаграмма'),
            (new Page(\App\Models\CircleDiagram::class))->setTitle('Цели для факторов'),
        ]
    ],
    (new Page(\App\Models\Type::class))->setTitle('Группы факторов'),
    (new Page(\App\Models\SocialNetwork::class))->setTitle('Социальные Сети'),
    (new Page(\App\Models\Country::class))->setTitle('Страны'),
    (new Page(\App\Models\Group::class))->setTitle('Типы факторов'),
    (new Page(\App\Models\Police\Police::class))->setTitle('Политики'),
    (new Page(\App\Models\Footer::class))->setTitle('Футер'),

];
