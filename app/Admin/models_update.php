<?php

use SleepingOwl\Admin\Model\ModelConfiguration;
use App\Models\Article\Article;
use \App\Models\Protocol\Protocol;

AdminSection::registerModel(Article::class, function (ModelConfiguration $model) {
    //dd($model);
    $model->created(function ($model, Article $data) {
        //dd($data);
    });
});
