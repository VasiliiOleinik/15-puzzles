<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Models\Article\Article;
use \App\Models\Category\CategoryForNews;
use \App\Models\Category\CategoryForBooks;
use \App\Models\MemberCase;

AdminSection::registerModel(Article::class, function (ModelConfiguration $model) {
    $model->created(function ($model, Article $data) {
        $article = $data->articlesRu;
        $data->alias = URLify::filter($article->title.' '.$article->article->created_at.' '.$article->article->id, 190);
        $data->save();

        Cache::clear();
    });
});

AdminSection::registerModel(CategoryForNews::class, function (ModelConfiguration $model) {
    $model->created(function ($model, CategoryForNews $data) {
        $category = $data->categoryRu;
        $data->alias = URLify::filter($category->name.' '.$category->created_at.' s'.$category->id, 190);
        $data->save();

        Cache::clear();
    });
});

AdminSection::registerModel(CategoryForBooks::class, function (ModelConfiguration $model) {
    $model->created(function ($model, CategoryForBooks $data) {
        $dataItem = $data->bookRu;
        $data->alias = URLify::filter($dataItem->name.' '.$dataItem->created_at.' '.$dataItem->id, 190);
        $data->save();

        Cache::clear();
    });
});

AdminSection::registerModel(MemberCase::class, function (ModelConfiguration $model) {
    $model->created(function ($model, MemberCase $data) {
        $dataItem = $data->casesRu;
        $data->alias = URLify::filter($dataItem->name.' '.$dataItem->created_at.' '.$dataItem->id, 190);
        $data->save();

        Cache::clear();
    });
});

AdminSection::registerModel(\App\Models\PageLang::class, function (ModelConfiguration $model) {
    $model->created(function ($model, \App\Models\PageLang $data) {
       dd($data);

        Cache::clear();
    });
});
