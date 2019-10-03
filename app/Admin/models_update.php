<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Models\Article\Article;

AdminSection::registerModel(Article::class, function (ModelConfiguration $model) {
//    dd($model);
    $model->updating(function ($model, Article $data) {
        //dd($model);
    });
});
