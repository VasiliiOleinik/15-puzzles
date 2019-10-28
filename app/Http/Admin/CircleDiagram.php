<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class CircleDiagram
 *
 * @property \App\Models\CircleDiagram $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class CircleDiagram extends Section
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
            \AdminColumn::text('name')->setLabel('Имя'),
            \AdminColumn::text('status')->setLabel('Статус картинки'),

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
        $columns1 = \AdminFormElement::columns([
            [
                \AdminFormElement::image('img', 'Изображение')->required(),
            ],
        ]);

        $columns2 = \AdminFormElement::columns([
            [
                \AdminFormElement::text('circleRu.name_target')->setLabel('Имя цели RU')->required(),
            ],
            [
                \AdminFormElement::text('circleEng.name_target')->setLabel('Имя цели ENG')->required(),
                \AdminFormElement::hidden('circleRu.language')->setDefaultValue('ru'),
                \AdminFormElement::hidden('circleEng.language')->setDefaultValue('eng')
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
