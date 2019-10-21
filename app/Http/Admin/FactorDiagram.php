<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class FactorDiagram
 *
 * @property \App\Models\Factor\FactorDiagram $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class FactorDiagram extends Section
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
            \AdminColumn::text('factorRu.name')->setLabel('Имя фактора'),
            \AdminColumn::lists('organ.name')->setLabel('На какой орган действует'),
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
                \AdminFormElement::multiselect('organ', 'На какой орган действует')
                    ->setModelForOptions(\App\Models\Organ::class)
                    ->setDisplay('name'),
            ],
        ]);

        $columns2 = \AdminFormElement::columns([
            [
                \AdminFormElement::textarea('factorRu.normal_condition', 'Нормальная кондиция Ru'),
                \AdminFormElement::textarea('factorRu.abnormal_condition', 'Нормальная кондиция Ru')
            ],
            [
                \AdminFormElement::textarea('factorEng.normal_condition', 'Нормальная кондиция Eng'),
                \AdminFormElement::textarea('factorEng.abnormal_condition', 'Ненормальная кондиция Eng'),

                \AdminFormElement::hidden('factorRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('factorRu.language')->setDefaultValue('eng')
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
//    public function onCreate()
//    {
//        return $this->onEdit(null);
//    }

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
