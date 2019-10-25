<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class NameCols
 *
 * @property \App\Models\NameCols $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class NameCols extends Section
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
            \AdminColumn::text('id')->setLabel('Изменение колонок в таблице на странице факторной диаграммы'),

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
        $columns = \AdminFormElement::columns([
            [
                \AdminFormElement::text('colsRu.col1')->setLabel('Колонка Имя фактора'),
                \AdminFormElement::text('colsRu.col2')->setLabel('Колонка Группы связанных факторов'),
                \AdminFormElement::text('colsRu.col3')->setLabel('Колонка Нормальное состояние'),
                \AdminFormElement::text('colsRu.col4')->setLabel('Колонка Паталогия'),
                \AdminFormElement::text('colsRu.col5')->setLabel('Колонка Методы коррекции патологии'),
                \AdminFormElement::text('colsRu.col6')->setLabel('Колонка Анализы'),
            ],
            [
                \AdminFormElement::text('colsEng.col1')->setLabel('Колонка Имя фактора'),
                \AdminFormElement::text('colsEng.col2')->setLabel('Колонка Группы связанных факторов'),
                \AdminFormElement::text('colsEng.col3')->setLabel('Колонка Нормальное состояние'),
                \AdminFormElement::text('colsEng.col4')->setLabel('Колонка Паталогия'),
                \AdminFormElement::text('colsEng.col5')->setLabel('Колонка Методы коррекции патологии'),
                \AdminFormElement::text('colsEng.col6')->setLabel('Колонка Анализы'),

                \AdminFormElement::hidden('colsRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('colsEng.language')->setDefaultValue('eng')
            ]

        ]);
        $form = \AdminForm::panel()->addBody(
            $columns
        );
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
//    public function onDelete($id)
//    {
//        // remove if unused
//    }

    /**
     * @return void
     */
//    public function onRestore($id)
//    {
//        // remove if unused
//    }
}
