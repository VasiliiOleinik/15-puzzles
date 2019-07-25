<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class Users
 *
 * @property \App\Models\User\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Users extends Section implements Initializable
{
    /**
     * @var \App\Models\fundamentalSetting
     */
    protected $model = '\App\Models\User\User';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return \App\Models\User\User::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
            //...
        });
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
    protected $title = 'Пользователи';

    /**
     * @var string
     */
    protected $alias = 'users';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()/*->with('users')*/
            ->setHtmlAttribute('class', 'table-primary')
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::link('nickname', 'логин')->setWidth('200px'),
                AdminColumn::text('first_name', 'имя'),
                AdminColumn::text('middle_name', 'фамилия'),
                AdminColumn::text('last_name', 'отчество'),
                AdminColumn::text('email', 'почта'),
                AdminColumn::text('birthday', 'дата рождения'),                
            )->paginate(20);       
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        // поле var - нельзя редактировать, ибо нефиг системообразующий код редактировать
        return AdminForm::panel()->addBody([
            AdminFormElement::text('nickname', 'логин')->required(),
            AdminFormElement::text('first_name', 'имя'),
            AdminFormElement::text('middle_name', 'фамилия'),
            AdminFormElement::text('last_name', 'отчество'),
            AdminFormElement::text('email', 'почта')->required(),
            AdminFormElement::text('birthday', 'дата рождения'),
            //AdminFormElement::wysiwyg('test', 'Text'),
            AdminFormElement::text('id', 'ID')->setReadonly(1),
            AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1),

        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        //return $this->onEdit(null);
        // а вот создать var можно. Один раз и навсегда
        return AdminForm::panel()->addBody([
            AdminFormElement::text('nickname', 'логин')->required(),
            AdminFormElement::text('first_name', 'имя'),
            AdminFormElement::text('middle_name', 'фамилия'),
            AdminFormElement::text('last_name', 'отчество'),
            AdminFormElement::text('email', 'почта')->required(),
            AdminFormElement::text('birthday', 'дата рождения'),

        ]);
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
        return 'Создание пользователя';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}
