<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Organ
 *
 * @property \App\Models\Organ $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Organ extends Section
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
            \AdminColumn::text('name')->setLabel('Название')
        ]);

        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $columns = \AdminFormElement::columns([
            [
                \AdminFormElement::text('name')->setLabel('Имя'),
                \AdminFormElement::text('z-coordinate')->setLabel('z-coord'),
                \AdminFormElement::text('y-coordinate')->setLabel('z-coord'),
                \AdminFormElement::text('parent-coordinate')->setLabel('parent-coord'),
            ],

        ]);
        $form = \AdminForm::panel()->addBody(
            $columns
        );
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
