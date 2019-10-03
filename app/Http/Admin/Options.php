<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumn;

/**
 * Class Options
 *
 * @property \App\Models\Options $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Options extends Section
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
            AdminColumn::text('privacy_policy')->setLabel('privacy policy'),
            AdminColumn::text('terms_of_service')->setLabel('terms of service'),
            AdminColumn::text('admin_email')->setLabel('email admin'),

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
                \AdminFormElement::text('privacy_policy')->setLabel('privacy policy'),
                \AdminFormElement::text('terms_of_service')->setLabel('terms of service')
            ],
            [
                \AdminFormElement::image('logo')
            ]

        ]);
        $form = \AdminForm::panel()->addBody(
            $columns
        );
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
