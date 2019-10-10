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

/**
 * Class Comments
 *
 * @property \App\Models\Comment $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Comments extends Section implements Initializable
{
    /**
     * @var \App\Models\fundamentalSetting
     */
    protected $model = '\App\Models\Comment';

    /**
     * Initialize class.
     */
    public function initialize()
    {

    }

    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = 'Комментарии';

    /**
     * @var string
     */
    protected $alias = 'comments';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            //->with(['roles'])
            ->setApply(function($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->setColumns(
                AdminColumn::text('content')->setLabel('комментарий'),
                AdminColumn::text('created_at')->setLabel('создано'),
                AdminColumn::relatedLink('memberCase.casesRu.title', 'история болезни'),
                AdminColumn::relatedLink('user.nickname', 'пользователь')
            )
             ->setFilters(
                AdminDisplayFilter::field('user_id')->setTitle('id пользователя [:value]')
            );
        $display
            //поля поиска
            ->setColumnFilters(
            [
                null,
                // Поиск по диапазону дат
                AdminColumnFilter::range()->setFrom(
                    AdminColumnFilter::date()->setPlaceholder('From Date')->setFormat('Y-m-d')
                )->setTo(
                    AdminColumnFilter::date()->setPlaceholder('To Date')->setFormat('Y-m-d')
                ),
                AdminColumnFilter::text()
                    ->setPlaceholder('Заголовок истории болезни')
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS),
                AdminColumnFilter::text()
                    ->setPlaceholder('Введите логин юзера')
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS)
            ]
            );
        $display->getColumnFilters()->setPlacement('table.header');

        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $form = AdminForm::panel()->addBody([
            AdminFormElement::textarea('content')->setLabel('комментарий')->required(),
            AdminFormElement::text('user.nickname')->setLabel('логин пользователя, оставившего комментарий')->setReadonly(1),
            AdminFormElement::text('user.first_name')->setLabel('имя пользователя')->setReadonly(1),
            AdminFormElement::text('user.middle_name')->setLabel('фамилия пользователя')->setReadonly(1),
            AdminFormElement::text('user.last_name')->setLabel('отчество пользователя')->setReadonly(1),
            AdminFormElement::text('memberCase.title')->setLabel('пост истории болезни где оставлен комментарий')->setReadonly(1),
            AdminFormElement::text('created_at')->setLabel('создано')->setReadonly(1)
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

    //заголовок для создания записи
    public function getCreateTitle()
    {
        return 'Создание комментария';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-comments';
    }
}
