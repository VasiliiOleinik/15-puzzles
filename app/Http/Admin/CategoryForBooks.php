<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class CategoryForBooks
 *
 * @property \App\Models\Category\CategoryForBooks $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class CategoryForBooks extends Section
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
            \AdminColumn::text('bookRu.name')->setLabel('Название'),
            \AdminColumn::text('alias', 'Алиас (название страницы)')
                ->setOrderable(false),
            \AdminColumnEditable::checkbox('is_active', 'Да', 'Нет')->setLabel('Показывать')
                ->setOrderable(false),
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
                \AdminFormElement::text('bookEng.name')->setLabel('Название ENG'),

            ],
            [
                \AdminFormElement::text('bookRu.name')->setLabel('Название RU')->required(),
                \AdminFormElement::hidden('bookRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('bookEng.language')->setDefaultValue('eng')
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
