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
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule; //import Rule class

/**
 * Class Roles
 *
 * @property \App\Models\Role\Role $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Roles extends Section implements Initializable
{
    /**
     * @var \App\Models\fundamentalSetting
     */
    protected $model = '\App\Models\Role\Role';

    /**
     * Initialize class.
     */
    public function initialize()
    {        
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        /*$this->addToNavigation($priority = 500, function() {
            return \App\Models\Role\Role::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {
            //...
        });*/
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
    protected $title = 'Роли';

    /**
     * @var string
     */
    protected $alias = 'roles';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::datatablesAsync()        
            ->setColumns(
                AdminColumn::link('id')->setLabel('id'),
                AdminColumn::link('name')->setLabel('роль')
            );

    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $rules = ['string', 'max:191', Rule::unique('roles')->ignore($id)];
        return AdminForm::panel()->addBody([            
            AdminFormElement::text('name', 'роль')->setValidationRules($rules)->required()
        ]); 
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

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-user-circle';
    }
}

