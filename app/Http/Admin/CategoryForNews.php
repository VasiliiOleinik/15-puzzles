<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Display\Extension\FilterInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class CategoryForNews
 *
 * @property \App\Models\Category\CategoryForNews $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class CategoryForNews extends Section
{
    protected $model = '\App\Models\Category\CategoryForNews';
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
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = \AdminDisplay::datatablesAsync()->setColumns([
            \AdminColumn::text('categoryRu.name', 'Название (Title)'),
            \AdminColumn::text('alias', 'Алиас (название страницы)'),
            \AdminColumnEditable::checkbox('is_active', 'Да', 'Нет')->setLabel('Показывать'),

        ]);

        $display->setColumnFilters([
            \AdminColumnFilter::text()->setPlaceholder('Введите название')->setOperator(FilterInterface::CONTAINS),
        ]);
        $display->getColumnFilters()->setPlacement('table.header');
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
                \AdminFormElement::text('categoryEng.name')->setLabel('Название ENG')->required(),
                \AdminFormElement::text('categoryRu.name')->setLabel('Название RU')->required(),

                \AdminFormElement::hidden('categoryRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('categoryEng.language')->setDefaultValue('eng')
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
