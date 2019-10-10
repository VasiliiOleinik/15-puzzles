<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Laboratory
 *
 * @property \App\Models\Laboratory\Laboratory $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Laboratory extends Section
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
            \AdminColumn::text('name')->setLabel('Имя лаборатории'),
            \AdminColumnEditable::text('lat')->setLabel('Lat'),
            \AdminColumnEditable::text('lng')->setLabel('Long'),
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
        $columns1 = \AdminFormElement::columns([
            [
                \AdminFormElement::text('name')->setLabel('Имя лаборатории'),
                \AdminFormElement::text('lat')->setLabel('Lat'),
                \AdminFormElement::text('lng')->setLabel('Long'),
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
