<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Article\Article;
use App\Models\Article\ArticleLanguage;
use App\Scopes\LanguageScope;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

/**
 * Class ArticleLanguages
 *
 * @property \App\Models\Article\ArticleLanguage $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class ArticleLanguages extends Section implements Initializable
{
    protected $model = '\App\Models\Article\ArtileLanguage';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        /*// Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return Article::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {            
        });*/

    }

    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Статьи';

    /**
     * @var string
     */
    protected $alias = 'news';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['article'])
            ->setApply(function ($query) {
                $query->orderBy('article_id', 'desc');
            })
            ->setColumns(
                [
                    AdminColumn::text('title')->setLabel('Название статьи'),
                    AdminColumn::text('description')->setLabel('Краткое описание статьи'),
                    AdminColumn::text('content')->setLabel('Полное описание статьи'),
                    AdminColumn::text('language')->setLabel('Язык'),
                ]
            );

        return $display->setView( view('sleeping-owl.display.table' ) );
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $articleCurrent = ArticleLanguage::where('article_id', '=', $id)
            ->first();
        $articleRu = ArticleLanguage::withoutGlobalScope(LanguageScope::class)
            ->where('article_id', '=', $articleCurrent->article_id)
            ->where('language', '=', 'ru')
            ->first();
//        dd($articleRu);
        $ckeditor = view('sleeping-owl.pages.layout');
        $imageSrc = Article::find($this->model::find($id)->article_id)->img;
        $image = '<img id="img-admin" src="' . $imageSrc . '" width="100%" style="max-width: 600px;">';

        //Эти скрипты делают возможным отправку всех нужных полей форм с трех табов
        //(заполняются hidden поля на вкладке связей)
        $scripts = "<script src='/js/backend/admin-news.js')></script>";

        $formEng = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function ($instance) use ($ckeditor) {
                    return $ckeditor;
                }),
            AdminFormElement::custom()
                ->setDisplay(function ($instance) use ($scripts) {
                    return $scripts;
                }),

            AdminFormElement::text('title')->setName('titleEng')->setLabel('Название новости')->required(),
            AdminFormElement::textarea('description')->setName('descriptionEng')->setLabel('Краткое описание новости')->required(),
            AdminFormElement::textarea('content')->setName('contentEng')->setLabel('Полное описание новости')->required()
        ]);
        $formRu = AdminForm::panel()->addBody([
            AdminFormElement::text('article.articlesRu.title')->setName('titleRu')->setLabel('Название новости')->required(),
            AdminFormElement::textarea('description')->setName('descriptionRu')->setValue($articleRu->description)->setLabel('Краткое описание новости')->required(),
            AdminFormElement::textarea('content')->setName('contentRu')->setValue($articleRu->content)->setLabel('Полное описание новости')->required()
        ]);

        $formRelations = AdminForm::panel()->addBody([
            AdminFormElement::text('article.created_at')->setLabel('Создано')->setReadonly(1),
            AdminFormElement::custom()
                ->setDisplay(function ($instance) use ($image) {
                    return $image;
                }),
            AdminFormElement::hidden('img')->setLabel('картинка'),
            AdminFormElement::view('sleeping-owl.input-type-file'),
            AdminFormElement::multiselect('article.tags', 'Тэги этой статьи')->setModelForOptions(\App\Models\Tag::class)->setDisplay('name'),
            AdminFormElement::multiselect('article.categoriesForNews', 'Категории этой статьи')->setModelForOptions(\App\Models\Category\CategoryForNews::class)->setDisplay('name'),

            AdminFormElement::hidden('titleEng'),
            AdminFormElement::hidden('descriptionEng'),
            AdminFormElement::hidden('contentEng'),
            AdminFormElement::hidden('titleRu'),
            AdminFormElement::hidden('descriptionRu'),
            AdminFormElement::hidden('contentRu')
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($formEng, 'Новость eng');
        $tabs->appendTab($formRu, 'Новость ru');
        $tabs->appendTab($formRelations, 'Новость другое');

        return $tabs;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        $ckeditor = view('sleeping-owl.pages.layout');
        $image = '<img id="img-admin" width="30%" style="max-width: 400px;">';

        //Эти скрипты делают возможным отправку всех нужных полей форм с трех табов
        //(заполняются hidden поля на вкладке связей)
        $scripts = "<script src='/js/backend/admin-news.js')></script>";

        $formEng = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function ($instance) use ($ckeditor) {
                    return $ckeditor;
                }),
            AdminFormElement::custom()
                ->setDisplay(function ($instance) use ($scripts) {
                    return $scripts;
                }),

            AdminFormElement::custom('title')->setName('titleEng')->setLabel('Название новости')->required(),

            AdminFormElement::textarea('description')->setName('descriptionEng')->setLabel('Краткое описание новости')->required(),
            AdminFormElement::textarea('content')->setName('contentEng')->setLabel('Полное описание новости')->required()
        ]);
        $formRu = AdminForm::panel()->addBody([
            AdminFormElement::text('titleRu')->setName('titleRu')->setLabel('Название новости')->required(),
            AdminFormElement::textarea('description')->setName('descriptionRu')->setLabel('Краткое описание новости')->required(),
            AdminFormElement::textarea('content')->setName('contentRu')->setLabel('Полное описание новости')->required()
        ]);
        $formRelations = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function ($instance) use ($image) {
                    return $image;
                }),
            AdminFormElement::hidden('img')->setLabel('картинка'),
            AdminFormElement::view('sleeping-owl.input-type-file'),
            AdminFormElement::multiselect('article.tags', 'Тэги этой статьи')->setModelForOptions(\App\Models\Tag::class)->setDisplay('name'),
            AdminFormElement::multiselect('article.categoriesForNews', 'Категории этой статьи')->setModelForOptions(\App\Models\Category\CategoryForNews::class)->setDisplay('name'),

            AdminFormElement::hidden('titleEng'),
            AdminFormElement::hidden('descriptionEng'),
            AdminFormElement::hidden('contentEng'),
            AdminFormElement::hidden('titleRu'),
            AdminFormElement::hidden('descriptionRu'),
            AdminFormElement::hidden('contentRu')
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($formEng, 'Новость eng');
        $tabs->appendTab($formRu, 'Новость ru');
        $tabs->appendTab($formRelations, 'Новость другое');

        return $tabs;
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
