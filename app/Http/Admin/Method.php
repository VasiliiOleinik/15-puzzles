<?php

namespace App\Http\Admin;

use Composer\Cache;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Method
 *
 * @property \App\Models\Method $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Method extends Section
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
           \AdminColumn::text('methodRu.name')->setLabel('Название метода'),
           \AdminColumn::text('methodRu.content')->setLabel('Полное описание метода'),
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
        \Cache::clear();
        $columns1 = \AdminFormElement::columns([
            [
                \AdminFormElement::text('methodEng.name')->setLabel('Название метода  ENG'),
                \AdminFormElement::ckeditor('methodEng.content')->setLabel('Полное описание метода  ENG'),
            ],
            [
                \AdminFormElement::text('methodRu.name')->setLabel('Название метода  RU'),
                \AdminFormElement::ckeditor('methodRu.content')->setLabel('Полное описание метода  RU'),

                \AdminFormElement::hidden('methodRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('methodEng.language')->setDefaultValue('eng')
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
