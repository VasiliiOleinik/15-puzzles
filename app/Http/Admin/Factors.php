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
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

/**
 * Class Factors
 *
 * @property \App\Models\Factor\Factor $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Factors extends Section implements Initializable
{
    /**
     * @var \App\Models\fundamentalSetting
     */
    protected $model = '\App\Models\Factor\Factor';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return $this->model::count();
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
    protected $title = 'Факторы';

    /**
     * @var string
     */
    protected $alias = 'factors';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['type'])
            ->setColumns(
                AdminColumn::link('factorLanguages.name')->setLabel('Название фактора'),
                AdminColumn::text('factorLanguages.content')->setLabel('Описание Фактора'),
                AdminColumn::text('type.name')->setLabel('Тип фактора')
                //AdminColumn::relatedLink('memberCase.title', 'история болезни', 'id'),                
                //AdminColumn::relatedLink('user.nickname', 'пользователь', 'id'),
            );  
        $display
            //поля поиска
            ->setColumnFilters(
            [               
                AdminColumnFilter::text()
                    ->setPlaceholder('Название фактора')
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS),
                null,
                AdminColumnFilter::text()
                    ->setPlaceholder('Введите тип фактора')
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
        Artisan::call('cache:clear');
        Config::set('app.locale', 'ru');

        $form = AdminForm::panel()->addBody([           
            AdminFormElement::text('factorLanguages')->setLabel('Название фактора')->required(),
            AdminFormElement::textarea('content')->setLabel('Описание фатора')->required(),
            AdminFormElement::select('type_id', 'Тип фактора')->setModelForOptions(\App\Models\Type::class)->setDisplay('name')
                                              ->setDefaultValue('1'),
            AdminFormElement::multiselect('diseases', 'Болезни')->setModelForOptions(\App\Models\Disease\Disease::class)->setDisplay('name'),
            AdminFormElement::multiselect('protocols', 'Протоколы')->setModelForOptions(\App\Models\Protocol\ProtocolLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('remedies', 'Лекарства')->setModelForOptions(\App\Models\Remedy::class)->setDisplay('name'),
            AdminFormElement::multiselect('markers', 'Анализы')->setModelForOptions(\App\Models\Marker\Marker::class)->setDisplay('name')
        ]);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        
        Artisan::call('cache:clear');
        $form = AdminForm::panel()->addBody([
            //AdminFormElement::text('name')->setLabel('Название фактора')->required(),
            //AdminFormElement::textarea('content')->setLabel('Описание фатора')->required(),
            AdminFormElement::select('type_id', 'Тип фактора')->setModelForOptions(\App\Models\Type::class)->setDisplay('name')
                                              ->setDefaultValue('1'),
            AdminFormElement::multiselect('diseases', 'Болезни')->setModelForOptions(\App\Models\Disease\Disease::class)->setDisplay('name'),
            AdminFormElement::multiselect('protocols', 'Протоколы')->setModelForOptions(\App\Models\Protocol\ProtocolLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('remedies', 'Лекарства')->setModelForOptions(\App\Models\Remedy::class)->setDisplay('name'),
            AdminFormElement::multiselect('markers', 'Анализы')->setModelForOptions(\App\Models\Marker\Marker::class)->setDisplay('name')
        ]);

        return $form;
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
