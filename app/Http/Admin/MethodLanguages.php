<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use App\Models\Method;

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
 * Class MethodLanguages
 *
 * @property \App\Models\MethodLanguage $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class MethodLanguages extends Section implements Initializable
{
    protected $model = '\App\Models\Article\ArtileLanguage';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return Method::count();
        });

        $this->creating(function($config, \Illuminate\Database\Eloquent\Model $model) {            
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
    protected $title = 'Методы лечения';

    /**
     * @var string
     */
    protected $alias = 'methods';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['method'])            
            ->setColumns(
                AdminColumn::text('method_id')->setLabel('method id'),
                AdminColumnEditable::text('name')->setLabel('Название метода лечения'),            
                AdminColumnEditable::textarea('content')->setLabel('Полное описание метода лечения'),
                AdminColumn::text('language')->setLabel('Язык')
            );

        return $display->setView(view('sleeping-owl.display.table'));
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        Config::set('app.locale', 'eng');            

        //Эти скрипты делают возможным отправку всех нужных полей форм с трех табов
        //(заполняются hidden поля на вкладке связей)
        $scripts = "<script src='/js/backend/admin-methods.js')></script>";        

        $formEng = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($scripts) {
                    return $scripts;
                }),
            AdminFormElement::text('name')->setName('nameEng')->setLabel('Название новости')->required(),            
            AdminFormElement::textarea('content')->setName('contentEng')->setLabel('Полное описание новости')->required()
        ]);
        $formRu = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setName('nameRu')->setLabel('Название новости')->required(),            
            AdminFormElement::textarea('content')->setName('contentRu')->setLabel('Полное описание новости')->required()
        ]);
        $formRelations = AdminForm::panel()->addBody([        
            AdminFormElement::hidden('nameEng'),
            AdminFormElement::hidden('contentEng'),
            AdminFormElement::hidden('nameRu'),
            AdminFormElement::hidden('contentRu')
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($formEng, 'Метод лечения eng');
        $tabs->appendTab($formRu, 'Метод лечения ru');
        $tabs->appendTab($formRelations, 'Метод лечения другое');
        
        return $tabs;
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
