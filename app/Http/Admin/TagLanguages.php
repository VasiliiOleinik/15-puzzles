<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use App\Models\Tag;

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
 * Class TagLanguages
 *
 * @property \App\Models\TagLanguage $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class TagLanguages extends Section implements Initializable
{
    protected $model = '\App\Models\TagLanguage';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return Tag::count();
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
    protected $title = 'Тэги';

    /**
     * @var string
     */
    protected $alias = 'tags';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['tag'])
            ->setApply(function($query) {
                $query->orderBy('tag_id', 'desc')->orderBy('language', 'asc');
            })
            ->setColumns(
                //AdminColumn::text('tag_id')->setLabel('tag id'),
                AdminColumnEditable::text('name')->setLabel('Название тэга'),
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
        $scripts = "<script src='/js/backend/admin-tags.js')></script>";        

        $formEng = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($scripts) {
                    return $scripts;
                }),
            AdminFormElement::text('name')->setName('nameEng')->setLabel('Название тэга')->required()
        ]);
        $formRu = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setName('nameRu')->setLabel('Название тэга')->required()
        ]);
        $formRelations = AdminForm::panel()->addBody([         

            AdminFormElement::hidden('nameEng'),
            AdminFormElement::hidden('nameRu')
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($formEng, 'Тэг eng');
        $tabs->appendTab($formRu, 'Тэг ru');
        $tabs->appendTab($formRelations, 'Тэг другое');
        
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
