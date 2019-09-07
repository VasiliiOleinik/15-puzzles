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
 * Class Subscriber
 *
 * @property \App\Models\Subscriber $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Subscribers extends Section implements Initializable
{
    /**
     * @var \App\Models\fundamentalSetting
     */
    protected $model = '\App\Models\Subscriber';

    /**
     * Initialize class.
     */
    public function initialize()
    {        
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        /*$this->addToNavigation($priority = 500, function() {
            return $this->model::count();
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
    protected $title = 'Подписчики';

    /**
     * @var string
     */
    protected $alias = 'subscribers';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            ->setColumns(
                //AdminColumn::link('id')->setLabel('id'),
                AdminColumn::text('email')->setLabel('почта'),
                AdminColumn::text('language')->setLabel('Язык')
            )
            ->setApply(function($query) {
                $query->orderBy('id', 'desc');
            });
        $display
            //поля поиска
            ->setColumnFilters(
            [
                null,
                AdminColumnFilter::text()
                    ->setPlaceholder('Введите почту')
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
        $rulesEmail = ['required', 'string', 'email', 'max:191', Rule::unique('users')->ignore($id)];
 
        return AdminForm::panel()->addBody([            
            AdminFormElement::text('email', 'почта')->setValidationRules($rulesEmail)->required(),
            AdminFormElement::select('language', 'язык')->setOptions(['eng' => 'eng', 'ru' => 'ru']),
            AdminFormElement::text('id', 'ID')->setReadonly(1),                   
        ]); 
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        $rulesEmail = ['required', 'string', 'email', 'max:191', Rule::unique('users')];

        return AdminForm::panel()->addBody([            
            AdminFormElement::text('email', 'почта')->setValidationRules($rulesEmail)->required(),
            AdminFormElement::select('language', 'язык')->setOptions(['eng' => 'eng', 'ru' => 'ru'])
                ->setDefaultValue('eng'),
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
        return 'Создание подписчика';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-user-plus';
    }
}
