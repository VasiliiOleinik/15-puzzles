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
            AdminColumn::text('name_page', 'Название страницы'),
            AdminColumn::text('lang', 'Язык страницы'),
            AdminColumn::text('title', 'Title'),

        ]);
        $display->setColumnFilters([
            AdminColumnFilter::text()->setPlaceholder('Введите название')->setOperator(FilterInterface::CONTAINS),
        ]);
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
                AdminFormElement::text('name_page', 'Имя страницы')->required(),

            ],
            [
                AdminFormElement::image('img', 'Изображение на странице')
            ],
            [
                AdminFormElement::text('video', 'Ссылка на видео из ютуба')
            ]
        ]);
        $columns2 = AdminFormElement::columns([
            [
                AdminFormElement::text('h1', 'Заголовок h1')
            ],
            [
                AdminFormElement::text('title', 'Title'),
                AdminFormElement::textarea('short_description', 'Описание короткое')
            ],
            [
                AdminFormElement::textarea('puzzles_description', 'Текст под баннером')
            ]

        ]);
        $form = AdminForm::panel()->addBody([
            $columns1,
            $columns2,
            AdminFormElement::wysiwyg('description', 'Главный текст на странице', 'tinymce'),
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
