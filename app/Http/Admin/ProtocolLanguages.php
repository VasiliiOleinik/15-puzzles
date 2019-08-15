<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use App\Models\Protocol\Protocol;

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
use Illuminate\Support\Facades\Cache;

/**
 * Class ProtocolLanguages
 *
 * @property \App\Models\Disease\ProtocolLanguage $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class ProtocolLanguages extends Section implements Initializable
{
    /**
     * @var \App\Mgit odels\fundamentalSetting
     */
    protected $model = '\App\Models\Protocol\ProtocolLanguage';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return \App\Models\Protocol\Protocol::count();
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
    protected $title = 'Протоколы';

    /**
     * @var string
     */
    protected $alias = 'protocols';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        Cache::forget('protocol_eng');
        Cache::forget('protocol_ru');
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['protocol'])
            ->setColumns(
                AdminColumn::text('protocol_id')->setLabel('protocol id'),
                AdminColumnEditable::text('name')->setLabel('Название протокола'),
                AdminColumnEditable::textarea('subtitle')->setLabel('Заголовок описания протокола'),
                AdminColumnEditable::textarea('content')->setLabel('Описание протокола'),
                AdminColumn::text('protocol.evidence.name', '' ,'factor.evidence.id')->setLabel('степень доказанности'),
                AdminColumn::text('protocol.url')->setLabel('Ссылка на протокол'),
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

        $imageSrc = Protocol::find( $this->model::find($id)->protocol_id )->img;                 

        $form = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setLabel('Название протокола')->setReadonly(1),
            AdminFormElement::text('protocol.url')->setLabel('Ссылка на протокол'),  
            //AdminFormElement::textarea('content')->setLabel('Описание фатора')->required()->setReadonly(1),
            AdminFormElement::select('protocol.evidence_id', 'Степень доказанности')->setModelForOptions(\App\Models\Evidence::class)
                                              ->setDisplay('name')
                                              ->setDefaultValue('1'), 
                
            AdminFormElement::multiselect('protocol.factors', 'Факторы')->setModelForOptions(\App\Models\Factor\Factor::class)->setDisplay('name'),
            AdminFormElement::multiselect('protocol.diseases', 'Болезни')->setModelForOptions(\App\Models\Disease\Disease::class)->setDisplay('name'),
            AdminFormElement::multiselect('protocol.remedies', 'Лекарства')->setModelForOptions(\App\Models\Remedy::class)->setDisplay('name'),
            AdminFormElement::multiselect('protocol.markers', 'Анализы')->setModelForOptions(\App\Models\Marker\Marker::class)->setDisplay('name')
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

        $formEng = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($scripts) {
                    return $scripts;
                }),
            AdminFormElement::text('name')->setName('nameEng')->setLabel('Название протокола')->required(),
            AdminFormElement::text('subtitle')->setName('subtitleEng')->setLabel('Заголовок описания протокола')->required(),
            AdminFormElement::textarea('content')->setName('contentEng')->setLabel('Описание протокола')->required()            
        ]);
        $formRu = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setName('nameRu')->setLabel('Название протокола')->required(),
            AdminFormElement::text('subtitle')->setName('subtitleRu')->setLabel('Заголовок описания протокола')->required(),
            AdminFormElement::textarea('content')->setName('contentRu')->setLabel('Описание протокола')->required(),
            AdminFormElement::text('protocol.url')->setLabel('Ссылка на протокол')
        ]);
        $formRelations = AdminForm::panel()->addBody([
            AdminFormElement::select('protocol.evidence_id', 'Степень доказанности')->setModelForOptions(\App\Models\Evidence::class)
                                              ->setDisplay('name')
                                              ->setDefaultValue('1')->required(),
                                              
            AdminFormElement::multiselect('protocol.factors', 'Факторы')->setModelForOptions(\App\Models\Factor\FactorLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('protocol.diseases', 'Болезни')->setModelForOptions(\App\Models\Disease\DiseaseLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('protocol.remedies', 'Лекарства')->setModelForOptions(\App\Models\RemedyLanguage::class)->setDisplay('name'),
            AdminFormElement::multiselect('protocol.markers', 'Анализы')->setModelForOptions(\App\Models\Marker\MarkerLanguage::class)->setDisplay('name'),

            AdminFormElement::hidden('nameEng'),
            AdminFormElement::hidden('subtitleEng'),
            AdminFormElement::hidden('contentEng'),
            AdminFormElement::hidden('nameRu'),
            AdminFormElement::hidden('subtitleRu'),
            AdminFormElement::hidden('contentRu')
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($formEng, 'Протокол eng');
        $tabs->appendTab($formRu, 'Протокол ru');
        $tabs->appendTab($formRelations, 'Протокол связи');
        
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

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-file';
    }
}
