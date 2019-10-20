<?php

namespace App\Http\Admin;

use App\Models\Type;
use App\Models\TypesLanguage;
use Composer\Cache;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Factor
 *
 * @property \App\Models\Factor\Factor $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Factor extends Section
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
            \AdminColumn::text('factorRu.content')->setLabel('Описание Фактора'),
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
                \AdminFormElement::text('factorEng.name')->setLabel('Название ENG'),
                \AdminFormElement::ckeditor('factorEng.content')->setLabel('Контент ENG'),

            ],
            [
                \AdminFormElement::text('factorRu.name')->setLabel('Название RU'),
                \AdminFormElement::ckeditor('factorRu.content')->setLabel('Контент RU'),

                \AdminFormElement::hidden('factorRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('factorEng.language')->setDefaultValue('eng')
            ]
        ]);
        $columns2 = \AdminFormElement::columns([
            [
                \AdminFormElement::image('img')->setLabel('Изображение'),

                \AdminFormElement::multiselect('diseases', 'Болезни')
                    ->setModelForOptions(\App\Models\Disease\Disease::class, 'diseaseRu.name'),

//                \AdminFormElement::multiselect('protocols', 'Протоколы описывающие фактор')
//                    ->setModelForOptions(\App\Models\Protocol\Protocol::class, 'protocolRu.name'),
//
//                \AdminFormElement::multiselect('remedies', 'Лекарства')
//                    ->setModelForOptions(\App\Models\Remedy::class, 'remedyRu.name'),
//
//                \AdminFormElement::multiselect('markers', 'Анализы')
//                    ->setModelForOptions(\App\Models\Marker\Marker::class, 'markerRu.name')

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
