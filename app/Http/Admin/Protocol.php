<?php

namespace App\Http\Admin;

use Composer\Cache;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Display\Extension\FilterInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Protocol
 *
 * @property \App\Models\Protocol\Protocol $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Protocol extends Section
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
            \AdminColumn::text('protocolRu.name')->setLabel('Название протокола'),
            \AdminColumn::text('protocolRu.subtitle')->setLabel('Заголовок описания протокола'),
            \AdminColumn::text('protocolRu.content')->setLabel('Описание протокола'),
            \AdminColumn::text('protocolRu.evidence.name')->setLabel('степень доказанности'),
            \AdminColumn::text('url')->setLabel('Ссылка на протокол')
                ->setOrderable(false),
        ]);
        $display->setApply(function ($query) {
            $query->where('language', 'ru');

        });
        $display->setColumnFilters([
            \AdminColumnFilter::text()->setPlaceholder('Введите название')->setOperator(FilterInterface::CONTAINS),
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
        \Cache::clear();
        $columns1 = \AdminFormElement::columns([
            [
                \AdminFormElement::text('protocolEng.name')->setLabel('Название протокола ENG'),
                \AdminFormElement::text('protocolEng.subtitle')->setLabel('Заголовок описания протокола ENG'),
                \AdminFormElement::textarea('protocolEng.content')->setLabel('Описание протокола ENG'),
            ],
            [
                \AdminFormElement::text('protocolRu.name')->setLabel('Название протокола RU'),
                \AdminFormElement::text('protocolRu.subtitle')->setLabel('Заголовок описания протокола RU'),
                \AdminFormElement::textarea('protocolRu.content')->setLabel('Описание протокола RU'),

                \AdminFormElement::hidden('protocolRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('protocolEng.language')->setDefaultValue('eng')
            ]
        ]);
        $columns2 = \AdminFormElement::columns([
            [
                \AdminFormElement::select('evidence_id', 'степень доказанности ENG', \App\Models\Evidence::class)
                    ->setDisplay('name')->required(),
                \AdminFormElement::text('url')->setLabel('Ссылка на протокол')->required(),
//
//                \AdminFormElement::multiselect('diseases', 'Болезни')
//                    ->setModelForOptions(\App\Models\Disease\Disease::class, 'diseaseRu.name'),
//
//                \AdminFormElement::multiselect('factors', 'Факторы')
//                    ->setModelForOptions(\App\Models\Factor\Factor::class, 'factorRu.name'),

                \AdminFormElement::multiselect('remedies', 'Лекарства')
                    ->setModelForOptions(\App\Models\Remedy::class, 'remedyRu.name'),

                \AdminFormElement::multiselect('markers', 'Анализы')
                    ->setModelForOptions(\App\Models\Marker\Marker::class, 'markerRu.name')
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
