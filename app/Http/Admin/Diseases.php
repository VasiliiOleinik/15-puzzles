<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use AdminColumn;
use AdminColumnEditable;
use AdminColumnFilter;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

/**
 * Class Diseases
 *
 * @property \App\Models\Disease\Disease $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Diseases extends Section
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
        $display = AdminDisplay::datatablesAsync();
        $display
            ->setColumns([
                AdminColumn::text('diseaseRu.name')->setLabel('Название'),
                AdminColumn::text('diseaseRu.content')->setLabel('Описание'),
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
                AdminFormElement::text('diseaseEng.name')->setLabel('Имя Eng'),
                AdminFormElement::textarea('diseaseEng.content')->setLabel('Контент Eng'),
            ],
            [
                AdminFormElement::text('diseaseRu.name')->setLabel('Имя Ru'),
                AdminFormElement::textarea('diseaseRu.content')->setLabel('Контент Ru'),

                \AdminFormElement::hidden('diseaseRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('diseaseEng.language')->setDefaultValue('eng')
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
