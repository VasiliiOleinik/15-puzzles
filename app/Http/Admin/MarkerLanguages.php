<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use App\Models\Marker\Marker;

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
 * Class RemedyLanguages
 *
 * @property \App\Models\Remedy\RemedyLanguage $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class MarkerLanguages extends Section implements Initializable
{
    /**
     * @var \App\Mgit odels\fundamentalSetting
     */
    protected $model = '\App\Models\MarkerLanguage';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return Marker::count();
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
    protected $title = 'Анализы';

    /**
     * @var string
     */
    protected $alias = 'markers';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {       
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['marker'])
            ->setColumns(
                AdminColumn::text('marker_id')->setLabel('marker id'),
                AdminColumnEditable::text('name')->setLabel('Название анализа'),
                AdminColumnEditable::textarea('content')->setLabel('Описание анализа'),
                AdminColumn::text('language')->setLabel('Язык')
            );

        return $display->setView(view('sleeping-owl.display.table'));
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::multiselect('marker.methods', 'Методы лечения')->setModelForOptions(\App\Models\Method::class)->setDisplay('name')
        ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        Config::set('app.locale', 'eng');            

        //Эти скрипты делают возможным отправку всех нужных полей форм с трех табов
        //(заполняются hidden поля на вкладке связей)
        $scripts = "<script src='/js/backend/factorLanguages.js')></script>";        

        $formEng = AdminForm::panel()
            ->addBody([
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($scripts) {
                    return $scripts;
                }),
            AdminFormElement::text('name')->setName('nameEng')->setLabel('Название анализа')->required(),
            AdminFormElement::textarea('content')->setName('contentEng')->setLabel('Описание анализа')->required()
        ]);
        $formRu = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setName('nameRu')->setLabel('Название анализа')->required(),
            AdminFormElement::textarea('content')->setName('contentRu')->setLabel('Описание анализа')->required()
        ]);
        $formRelations = AdminForm::panel()->addBody([
            AdminFormElement::multiselect('marker.methods', 'Методы лечения')->setModelForOptions(\App\Models\Method::class)->setDisplay('name'),
            AdminFormElement::hidden('nameEng'),
            AdminFormElement::hidden('contentEng'),
            AdminFormElement::hidden('nameRu'),
            AdminFormElement::hidden('contentRu')
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($formEng, 'Анализ eng');
        $tabs->appendTab($formRu, 'Анализ ru');
        $tabs->appendTab($formRelations, 'Анализ связи');
        
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

    //заголовок для создания записи
    public function getCreateTitle()
    {
        return 'Создание анализа';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-thermometer';
    }
}
