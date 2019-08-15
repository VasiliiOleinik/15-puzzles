<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use App\Models\Disease\Disease;

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
 * Class DiseaseLanguages
 *
 * @property \App\Models\Disease\DiseaseLanguage $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class DiseaseLanguages extends Section implements Initializable
{
    /**
     * @var \App\Mgit odels\fundamentalSetting
     */
    protected $model = '\App\Models\Disease\DiseaseLanguage';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return \App\Models\Disease\Disease::count();
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
    protected $title = 'Болезни';

    /**
     * @var string
     */
    protected $alias = 'diseases';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {       
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['disease'])
            ->setColumns(
                AdminColumn::text('disease_id')->setLabel('disease id'),
                AdminColumnEditable::text('name')->setLabel('Название болезни'),
                AdminColumnEditable::textarea('content')->setLabel('Описание болезни'),
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
        Config::set('app.locale', 'eng');                 

        $form = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setLabel('Название фактора')->setReadonly(1),
                
            AdminFormElement::multiselect('disease.factors', 'Факторы')->setModelForOptions(\App\Models\Factor\Factor::class)->setDisplay('name'),
            AdminFormElement::multiselect('disease.protocols', 'Протоколы')->setModelForOptions(\App\Models\Protocol\Protocol::class)->setDisplay('name'),
            AdminFormElement::multiselect('disease.remedies', 'Лекарства')->setModelForOptions(\App\Models\Remedy::class)->setDisplay('name'),
            AdminFormElement::multiselect('disease.markers', 'Анализы')->setModelForOptions(\App\Models\Marker\Marker::class)->setDisplay('name')
        ]);
        return $form;
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
            AdminFormElement::text('name')->setName('nameEng')->setLabel('Название болезни')->required(),
            AdminFormElement::textarea('content')->setName('contentEng')->setLabel('Описание болезни')->required()
        ]);
        $formRu = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setName('nameRu')->setLabel('Название болезни')->required(),
            AdminFormElement::textarea('content')->setName('contentRu')->setLabel('Описание болезни')->required()
        ]);
        $formRelations = AdminForm::panel()->addBody([                                           
            AdminFormElement::multiselect('disease.factors', 'Факторы')->setModelForOptions(\App\Models\Factor\FactorLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('disease.protocols', 'Протоколы')->setModelForOptions(\App\Models\Protocol\ProtocolLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('disease.remedies', 'Лекарства')->setModelForOptions(\App\Models\RemedyLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('disease.markers', 'Анализы')->setModelForOptions(\App\Models\Marker\MarkerLanguage::class)->setDisplay('name'),

            AdminFormElement::hidden('nameEng'),
            AdminFormElement::hidden('contentEng'),
            AdminFormElement::hidden('nameRu'),
            AdminFormElement::hidden('contentRu')
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($formEng, 'Болезнь eng');
        $tabs->appendTab($formRu, 'Болезнь ru');
        $tabs->appendTab($formRelations, 'Болезнь связи');
        
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
        return 'Создание болезни';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-stethoscope';
    }
}
