<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Question
 *
 * @property \App\Models\Question $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Question extends Section
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
        $display = \AdminDisplay::datatablesAsync()->setColumns([
            \AdminColumn::text('questRu.name')->setLabel('Имя'),
            \AdminColumn::text('questRu.content')->setLabel('Контент'),
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
                \AdminFormElement::text('questEng.name')->setLabel('Название ENG'),
                \AdminFormElement::ckeditor('questEng.content')->setLabel('Контент ENG'),

            ],
            [
                \AdminFormElement::text('questRu.name')->setLabel('Название RU'),
                \AdminFormElement::ckeditor('questRu.content')->setLabel('Контент RU'),

                \AdminFormElement::hidden('questRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('questEng.language')->setDefaultValue('eng')
            ]
        ]);

        $form = \AdminForm::panel()->addBody([
            $columns1,
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
