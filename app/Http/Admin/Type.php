<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Type
 *
 * @property \App\Models\Type $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Type extends Section
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
            \AdminColumn::text('typesLang.name')->setLabel('Имя фактора'),
        ]);
        $display->setApply(function ($query) {
            $query->where('language', 'ru');
            $query->orderBy('created_at', 'desc');
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
                \AdminFormElement::multiselect('factors', 'Факторы')
                    ->setModelForOptions(\App\Models\Factor\Factor::class)
                    ->setDisplay('factorRu.name'),
            ],
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