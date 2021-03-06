<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Display\Extension\FilterInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Article
 *
 * @property \App\Models\Article\Article $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Article extends Section
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['articlesRu'])
            ->setColumns(
                [
                    //AdminColumn::text('articlesRu')->setLabel('Название статьи'),
                    AdminColumn::text('alias')->setLabel('Алиас(название страницы)'),
                    \AdminColumnEditable::checkbox('is_active', 'Да', 'Нет', 'Показывать')->setOrderable(false),
                    AdminColumn::text('created_at')->setLabel('Дата создания')->setOrderable(false),
                ]
            );

        $display->setColumnFilters([
            \AdminColumnFilter::text()->setPlaceholder('Введите название')->setOperator(FilterInterface::CONTAINS),
        ]);

        $display->setApply(function ($query) {
            $query->orderBy('created_at', 'desc');
            //$query->where('article_languages.language', 'ru');
        });


        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $columns1 = \AdminFormElement::columns([
            [
                AdminFormElement::text('articlesEng.title')->setLabel('Название новости ENG')->required(),
                AdminFormElement::textarea('articlesEng.description')->setLabel('Краткое описание новости ENG')->required(),
                AdminFormElement::ckeditor('articlesEng.content')->setLabel('Полное описание новости ENG')->required(),
            ],
            [
                AdminFormElement::text('articlesRu.title')->setLabel('Название новости RU')->required(),
                AdminFormElement::textarea('articlesRu.description')->setLabel('Краткое описание новости RU')->required(),
                AdminFormElement::ckeditor('articlesRu.content')->setLabel('Полное описание новости RU')->required(),
                AdminFormElement::hidden('articlesRu.language')->setDefaultValue('ru'),
                AdminFormElement::hidden('articlesEng.language')->setDefaultValue('eng')
            ]
        ]);

        $columns2 = AdminFormElement::columns([
            [
                AdminFormElement::image('img')->setLabel('картинка'),
                AdminFormElement::multiselect('tags', 'Тэги этой статьи')
                    ->setModelForOptions(\App\Models\Tag::class)
                    ->setDisplay('tagRu.name'),
                AdminFormElement::multiselect('categoriesForNews', 'Категории этой статьи')
                    ->setModelForOptions(\App\Models\Category\CategoryForNews::class)
                    ->setDisplay('categoryRu.name'),

                AdminFormElement::text('author')->setLabel('Автор')->required(),
            ]
        ]);

        $form = AdminForm::panel()->addBody([
            $columns1,
            $columns2
        ]);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
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
