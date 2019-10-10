<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Method
 *
 * @property \App\Models\Method $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Method extends Section
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
           \AdminColumn::text('methodRu.name')->setLabel('Название метода лечения'),
           \AdminColumn::text('methodRu.content')->setLabel('Полное описание метода лечения'),
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
                \AdminFormElement::text('methodEng.name')->setLabel('Название метода лечения ENG'),
                \AdminFormElement::textarea('methodEng.content')->setLabel('Полное описание метода лечения ENG'),
            ],
            [
                \AdminFormElement::text('methodRu.name')->setLabel('Название метода лечения RU'),
                \AdminFormElement::textarea('methodRu.content')->setLabel('Полное описание метода лечения RU'),

                \AdminFormElement::hidden('methodRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('methodEng.language')->setDefaultValue('eng')
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
