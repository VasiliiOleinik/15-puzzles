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
 * Class FactorLanguages
 *
 * @property \App\Models\Factor\FactorLanguage $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class FactorLanguages extends Section implements Initializable
{
    /**
     * @var \App\Mgit odels\fundamentalSetting
     */
    protected $model = '\App\Models\Factor\FactorLanguage';

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
    protected $title = 'Факторы lang';

    /**
     * @var string
     */
    protected $alias = 'factorLanguages';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {       
        Config::set('app.locale', 'eng');

        //Кнопки изменения локалей
        $buttonLocales = "<input type='button' class='btn btn-primary' value='ENG' obj-locale='eng' style='margin-bottom: 10px;'>
                          <input type='button' class='btn btn-primary mb-5' value='RU' obj-locale='ru' style='margin-bottom: 10px;'>";

        /*$tabs = AdminDisplay::tabbed();
        $tabs->appendTab(, 'Фактор eng');
        $tabs->appendTab(, 'Фактор ru');*/

        $form = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($buttonLocales) {
                    return $buttonLocales;
                })
        ]);

        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['factor'])
            ->setColumns(
                AdminColumn::text('id')->setLabel('id'),
                AdminColumnEditable::text('name')->setLabel('Название фактора'),
                AdminColumnEditable::textarea('content')->setLabel('Описание Фактора')->setWidth(8000),
                AdminColumn::text('factor.type.name')->setLabel('тип')
                //AdminColumnEditable::select('factor.type.id', 'Тип фактора')->setModelForOptions(\App\Models\Type::class)->setDisplay('name')
                    //->setDefaultValue('1')
            );
        return $display->setView(view('sleeping-owl.display.table', compact('buttonLocales')));
        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        //$this->model::withoutGlobalScopes()->get();
        Artisan::call('cache:clear');
        Config::set('app.locale', 'eng');

        $form = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setLabel('Название фактора')->setReadonly(1),
            //AdminFormElement::textarea('content')->setLabel('Описание фатора')->required()->setReadonly(1),
            AdminFormElement::select('factor.type_id', 'Тип фактора')->setModelForOptions(\App\Models\Type::class)->setDisplay('name')
                                              ->setDefaultValue('1'),
                                              
            AdminFormElement::multiselect('factor.diseases', 'Болезни')->setModelForOptions(\App\Models\Disease\DiseaseLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('factor.protocols', 'Протоколы')->setModelForOptions(\App\Models\Protocol\ProtocolLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('factor.remedies', 'Лекарства')->setModelForOptions(\App\Models\RemedyLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('factor.markers', 'Анализы')->setModelForOptions(\App\Models\Marker\MarkerLanguage::class)->setDisplay('name')
        ]);
        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        //Эти скрипты делают возможным отправку всех нужных полей форм с трех табов
        //(заполняются hidden поля на вкладке связей)
        $scripts = "<script src='/js/backend/factorLanguages.js')></script>";        

        $formEng = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($scripts) {
                    return $scripts;
                }),
            AdminFormElement::text('name')->setName('nameEng')->setLabel('Название фактора')->required(),
            AdminFormElement::textarea('content')->setName('contentEng')->setLabel('Описание фатора')->required()
        ]);
        $formRu = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setName('nameRu')->setLabel('Название фактора')->required(),
            AdminFormElement::textarea('content')->setName('contentRu')->setLabel('Описание фатора')->required()
        ]);
        $formRelations = AdminForm::panel()->addBody([           
            AdminFormElement::select('factor.type_id', 'Тип фактора')->setModelForOptions(\App\Models\Type::class)->setDisplay('name')
                                              ->setDefaultValue('1')->required(),
                                              
            AdminFormElement::multiselect('factor.diseases', 'Болезни')->setModelForOptions(\App\Models\Disease\DiseaseLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('factor.protocols', 'Протоколы')->setModelForOptions(\App\Models\Protocol\ProtocolLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('factor.remedies', 'Лекарства')->setModelForOptions(\App\Models\Remedy::class)->setDisplay('name'),
            AdminFormElement::multiselect('factor.markers', 'Анализы')->setModelForOptions(\App\Models\Marker\Marker::class)->setDisplay('name'),

            AdminFormElement::hidden('nameEng'),
            AdminFormElement::hidden('contentEng'),
            AdminFormElement::hidden('nameRu'),
            AdminFormElement::hidden('contentRu')
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($formEng, 'Фактор eng');
        $tabs->appendTab($formRu, 'Фактор ru');
        $tabs->appendTab($formRelations, 'Фактор связи');
        
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
