<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Footer
 *
 * @property \App\Models\Footer $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Footer extends Section
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
            \AdminColumn::text('id')->setLabel('Описание в футере'),
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
                \AdminFormElement::textarea('footerRu.disclaimer')->setLabel('Описание RU')
            ],
            [
                \AdminFormElement::textarea('footerEng.disclaimer')->setLabel('Описание Eng'),
                \AdminFormElement::hidden('footerRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('factorEng.language')->setDefaultValue('eng')
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
//    public function onRestore($id)
//    {
//        // remove if unused
//    }
}
