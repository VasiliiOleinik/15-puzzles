<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminColumnFilter;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Display\Extension\FilterInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Page
 *
 * @property \App\Models\Page $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Page extends Section
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
        $display = AdminDisplay::datatablesAsync()->setColumns([
            AdminColumn::text('pageRu.title', 'Название (Title)'),
            AdminColumn::text('name_page', 'Алиас (название страницы)')->setOrderable(false),
            \AdminColumnEditable::checkbox('is_active', 'Да', 'Нет')
                ->setLabel('Показывать')
                ->setOrderable(false),

        ]);
        $display->setColumnFilters([
            AdminColumnFilter::text()->setPlaceholder('Введите название')->setOperator(FilterInterface::CONTAINS),
        ]);
        $display->setApply(function ($query) {
            $query->where('pages_langs.language', "ru");
        });
        $display->getColumnFilters()->setPlacement('table.header');
        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $columns1 = AdminFormElement::columns([
            [
                AdminFormElement::text('name_page', 'Алиас (название страницы)')->required(),
                AdminFormElement::image('img', 'Изображение на странице'),
                AdminFormElement::text('video', 'Ссылка на видео из ютуба')
            ],
        ]);
        $columns2 = AdminFormElement::columns([
            [
                AdminFormElement::text('pageEng.h1', 'Заголовок h1 ENG')->required(),
                AdminFormElement::text('pageEng.title', 'Title ENG')->required(),
                AdminFormElement::ckeditor('pageEng.short_description', 'Описание короткое ENG'),
                AdminFormElement::ckeditor('pageEng.puzzles_description', 'Текст под баннером ENG'),
                AdminFormElement::ckeditor('pageEng.description', 'Главный текст на странице ENG'),
            ],
            [
                AdminFormElement::text('pageRu.h1', 'Заголовок h1 RU')->required(),
                AdminFormElement::text('pageRu.title', 'Title RU')->required(),
                AdminFormElement::ckeditor('pageRu.short_description', 'Описание короткое RU'),
                AdminFormElement::ckeditor('pageRu.puzzles_description', 'Текст под баннером RU'),
                AdminFormElement::ckeditor('pageRu.description', 'Главный текст на странице RU'),

                \AdminFormElement::hidden('pageRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('pageEng.language')->setDefaultValue('eng')
            ],

        ]);
        $form = AdminForm::panel()->addBody([
            $columns1,
            $columns2,

        ]);
        return $form;
    }

    /**
     * @return FormInterface
     */
//    public function onCreate()
//    {
//        return $this->onEdit(null);
//    }

    /**
     * @return void
     */
//    public function onDelete($id)
//    {
//        // remove if unused
//    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
