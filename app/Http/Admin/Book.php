<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Book
 *
 * @property \App\Models\Book\Book $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Book extends Section
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
        $display = \AdminDisplay::datatablesAsync()->with('bookRu')->setColumns([
            \AdminColumn::text('bookRu.title', 'Название'),
            \AdminColumn::text('bookRu.author', 'Автор'),
            \AdminColumnEditable::checkbox('is_active', 'Да', 'Нет')->setLabel('Показывать'),
        ]);
        $display->setApply(function ($query) {
            $query->where('language', 'ru');
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
                \AdminFormElement::text('bookEng.title')->setLabel('Название ENG'),
                \AdminFormElement::text('bookEng.author')->setLabel('Автор ENG'),
                \AdminFormElement::text('bookEng.description')->setLabel('Описание ENG'),

            ],
            [
                \AdminFormElement::text('bookRu.title')->setLabel('Название RU'),
                \AdminFormElement::text('bookRu.author')->setLabel('Автор RU'),
                \AdminFormElement::text('bookRu.description')->setLabel('Описание RU'),

                \AdminFormElement::hidden('bookRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('bookEng.language')->setDefaultValue('eng')

            ]
        ]);
        $columns2 = \AdminFormElement::columns([
            [
                \AdminFormElement::image('img')->setLabel('Изображение')
            ]
        ]);

        $form = \AdminForm::panel()->addBody([
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
