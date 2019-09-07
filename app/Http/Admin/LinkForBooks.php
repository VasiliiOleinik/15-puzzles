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
 * Class LinkForBooks
 *
 * @property \App\Models\Book\LinkForBooks $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class LinkForBooks extends Section implements Initializable
{
    /**
     * @var \App\Mgit odels\fundamentalSetting
     */
    protected $model = '\App\Book\LinkForBooks';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        /*// Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function()  {
            return $this->model::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {            
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
    protected $title = 'Магазины';

    /**
     * @var string
     */
    protected $alias = 'shops';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        return $display
            ->setColumns(
                //AdminColumn::text('id')->setLabel('id'),
                AdminColumnEditable::text('title')->setLabel('Название магазина'),
                AdminColumnEditable::text('url')->setLabel('Ссылка на магазин')
            )
            ->setApply(function($query) {
                $query->orderBy('id', 'desc');
            });
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {              
        return AdminForm::panel()->addBody([
            AdminFormElement::text('title')->setName('title')->setLabel('Название магазина')->required(),
            AdminFormElement::text('url')->setName('url')->setLabel('Ссылка на магазин')->required()
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
        return 'Новая ссылка на магазин';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-shopping-cart';
    }
}
