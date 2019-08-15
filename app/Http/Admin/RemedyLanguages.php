<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use App\Models\Remedy;

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
class RemedyLanguages extends Section implements Initializable
{
    /**
     * @var \App\Mgit odels\fundamentalSetting
     */
    protected $model = '\App\Models\RemedyLanguage';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return Remedy::count();
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
    protected $title = 'Лекарства';

    /**
     * @var string
     */
    protected $alias = 'remedies';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {       
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['remedy'])
            ->setColumns(
                AdminColumn::text('remedy_id')->setLabel('remedy id'),
                AdminColumnEditable::text('name')->setLabel('Название лекарства'),
                AdminColumnEditable::textarea('content')->setLabel('Описание лекарства'),
                AdminColumn::text('remedy.url')->setLabel('Ссылка на лекарство'),
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
        $form = AdminForm::panel()->addBody([
            AdminFormElement::text('name')->setLabel('Название лекарства')->setReadonly(1), 
            AdminFormElement::text('remedy.url')->setLabel('Ссылка на лекарство'),           
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
            AdminFormElement::text('name')->setName('nameEng')->setLabel('Название лекарства')->required(),
            AdminFormElement::textarea('content')->setName('contentEng')->setLabel('Описание лекарства')->required()
        ]);
        $formRu = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setName('nameRu')->setLabel('Название лекарства')->required(),
            AdminFormElement::textarea('content')->setName('contentRu')->setLabel('Описание лекарства')->required()
        ]);
        $formRelations = AdminForm::panel()->addBody([
            AdminFormElement::text('url')->setLabel('Ссылка на лекарство'),   

            AdminFormElement::hidden('nameEng'),
            AdminFormElement::hidden('contentEng'),
            AdminFormElement::hidden('nameRu'),
            AdminFormElement::hidden('contentRu')
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($formEng, 'Лекарство eng');
        $tabs->appendTab($formRu, 'Лекарство ru');
        $tabs->appendTab($formRelations, 'Другое');
        
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
        return 'Создание лекарства';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-stumbleupon-circle';
    }
}
