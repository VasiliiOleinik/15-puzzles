<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use App\Models\Factor\Factor;

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
            return \App\Models\Factor\Factor::count();
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
        Cache::forget('factor_eng');
        Cache::forget('factor_ru');
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['factor'])
            ->setApply(function ($query) {
                $query->withoutGlobalScopes();
            })
            ->setColumns(
                AdminColumn::text('factor_id')->setLabel('factor id'),
                AdminColumnEditable::text('name')->setLabel('Название фактора'),
                AdminColumnEditable::textarea('content')->setLabel('Описание Фактора'),
                AdminColumn::text('factor.type.name', '' ,'factor.type.id')->setLabel('тип'),
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

        $imageSrc = Factor::find( $this->model::find($id)->factor_id )->img;
        $image = '<img id="img-admin" src="'.$imageSrc.'" width="30%" style="max-width: 400px;">';                     

        $form = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setLabel('Название фактора')->setReadonly(1),
            //AdminFormElement::textarea('content')->setLabel('Описание фатора')->required()->setReadonly(1),
            AdminFormElement::select('factor.type_id', 'Тип фактора')->setModelForOptions(\App\Models\Type::class)->setDisplay('name')
                                              ->setDefaultValue('1'),
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($image) {
                    return $image;
                }),
            AdminFormElement::hidden('img')->setLabel('картинка'),
            AdminFormElement::view('sleeping-owl.input-type-file'),  
                
            AdminFormElement::multiselect('factor.diseases', 'Болезни')->setModelForOptions(\App\Models\Disease\Disease::class)->setDisplay('name'),
            AdminFormElement::multiselect('factor.protocols', 'Протоколы')->setModelForOptions(\App\Models\Protocol\Protocol::class)->setDisplay('name'),
            AdminFormElement::multiselect('factor.remedies', 'Лекарства')->setModelForOptions(\App\Models\Remedy::class)->setDisplay('name'),
            AdminFormElement::multiselect('factor.markers', 'Анализы')->setModelForOptions(\App\Models\Marker\Marker::class)->setDisplay('name')
        ]);
        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        Config::set('app.locale', 'eng');
        $image = '<img id="img-admin" width="30%" style="max-width: 400px;">';               

        //Эти скрипты делают возможным отправку всех нужных полей форм с трех табов
        //(заполняются hidden поля на вкладке связей)
        $scripts = "<script src='/js/backend/factorLanguages.js')></script>";        

        $formEng = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($scripts) {
                    return $scripts;
                }),
            AdminFormElement::text('name')->setName('nameEng')->setLabel('Название фактора')->required(),
            AdminFormElement::textarea('content')->setName('contentEng')->setLabel('Описание фактора')->required()
        ]);
        $formRu = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setName('nameRu')->setLabel('Название фактора')->required(),
            AdminFormElement::textarea('content')->setName('contentRu')->setLabel('Описание фактора')->required()
        ]);
        $formRelations = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($image) {
                    return $image;
                }),
            AdminFormElement::hidden('img')->setLabel('картинка'),
            AdminFormElement::view('sleeping-owl.input-type-file'),

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

    //заголовок для создания записи
    public function getCreateTitle()
    {
        return 'Создание фактора';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-retweet';
    }
}
