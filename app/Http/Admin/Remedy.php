<?php

namespace App\Http\Admin;

use Composer\Cache;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Remedy
 *
 * @property \App\Models\Remedy $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Remedy extends Section
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
            \AdminColumn::text('remedyRu.name')->setLabel('Название лекарства'),
            \AdminColumn::text('remedyRu.content')->setLabel('Описание лекарства'),
            \AdminColumn::url('url')->setLabel('Ссылка на лекарство'),
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
        \Cache::clear();
        $columns1 = \AdminFormElement::columns([
            [
                \AdminFormElement::text('remedyEng.name')->setLabel('Название лекарства ENG'),
                \AdminFormElement::textarea('remedyEng.content')->setLabel('Описание лекарства ENG'),
            ],
            [
                \AdminFormElement::text('remedyRu.name')->setLabel('Название лекарства RU'),
                \AdminFormElement::textarea('remedyRu.content')->setLabel('Описание лекарства RU'),
            ]
        ]);
        $columns2 = \AdminFormElement::columns([
            [
                \AdminFormElement::text('url')->setLabel('Ссылка на протокол')->required(),

                \AdminFormElement::multiselect('diseases', 'Болезни')
                    ->setModelForOptions(\App\Models\Disease\Disease::class, 'diseaseRu.name'),

                \AdminFormElement::multiselect('factors', 'Факторы')
                    ->setModelForOptions(\App\Models\Factor\Factor::class, 'factorRu.name'),

                \AdminFormElement::multiselect('protocols', 'Протоколы')
                    ->setModelForOptions(\App\Models\Protocol\Protocol::class, 'protocolRu.name'),


                \AdminFormElement::hidden('remedyRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('remedyEng.language')->setDefaultValue('eng')
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
        \Cache::clear();
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
