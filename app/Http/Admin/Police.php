<?php

namespace App\Http\Admin;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Display\Extension\FilterInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Article
 *
 * @property \App\Models\Article\Article $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Police extends Section
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
    protected $title = "Политики";

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
            ->with(['policeRu'])
            ->setColumns(
                [
                    AdminColumn::text('policeRu.title')->setLabel('Название статьи'),
                    AdminColumn::text('alias')->setLabel('Алиас(название страницы)')->setOrderable(false),
                    \AdminColumnEditable::checkbox('is_active', 'Да', 'Нет', 'Показывать')->setOrderable(false),
                    AdminColumn::text('created_at')->setLabel('Дата создания')->setOrderable(false),
                ]
            );
        $display->setColumnFilters([
            \AdminColumnFilter::text()->setPlaceholder('Введите название')->setOperator(FilterInterface::CONTAINS),
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
                AdminFormElement::text('policeEng.title')->setLabel('Название ENG')->required(),
                AdminFormElement::text('policeEng.h1')->setLabel('H1 ENG')->required(),
                AdminFormElement::textarea('policeEng.description')->setLabel('Краткое описание ENG')->required(),
                AdminFormElement::ckeditor('policeEng.content')->setLabel('Полное описание ENG')->required(),
            ],
            [
                AdminFormElement::text('policeRu.title')->setLabel('Название RU')->required(),
                AdminFormElement::text('policeRu.h1')->setLabel('H1 RU')->required(),
                AdminFormElement::textarea('policeRu.description')->setLabel('Краткое описание RU')->required(),
                AdminFormElement::ckeditor('policeRu.content')->setLabel('Полное описание RU')->required(),

                AdminFormElement::hidden('policeRu.language')->setDefaultValue('ru'),
                AdminFormElement::hidden('policeEng.language')->setDefaultValue('eng')
            ]
        ]);


        $form = AdminForm::panel()->addBody([
            $columns1
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
