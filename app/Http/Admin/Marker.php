<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Marker
 *
 * @property \App\Models\Marker\Marker $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Marker extends Section
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
            \AdminColumn::text('markerRu.name')->setLabel('Название анализа'),
            \AdminColumn::text('markerRu.content')->setLabel('Описание анализа'),
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
                \AdminFormElement::text('markerEng.name')->setLabel('Название анализа ENG'),
                \AdminFormElement::textarea('markerEng.content')->setLabel('Описание анализа ENG'),
            ],
            [
                \AdminFormElement::text('markerRu.name')->setLabel('Название анализа Ru'),
                \AdminFormElement::textarea('markerRu.content')->setLabel('Описание анализа RU'),

                \AdminFormElement::hidden('markerRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('markerEng.language')->setDefaultValue('eng')
            ]
        ]);
        $columns2 = \AdminFormElement::columns([
            [
                \AdminFormElement::multiselect('methods', 'Методы лечения')->setModelForOptions(\App\Models\Method::class)->setDisplay('name')
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
