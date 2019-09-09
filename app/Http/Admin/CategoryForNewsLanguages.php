<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use App\Models\Category\CategoryForNews;

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
 * Class CategoryForNewsLanguages
 *
 * @property \App\Models\Category\CategoryForNewsLanguage $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class CategoryForNewsLanguages extends Section implements Initializable
{
    protected $model = '\App\Models\Category\CategoryForNewsLanguage';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return CategoryForNews::count();
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
    protected $title = 'Категории новостей';

    /**
     * @var string
     */
    protected $alias = 'news_categories';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['categoriesForNews'])
            ->setApply(function($query) {
                $query->orderBy('category_for_news_id', 'desc')->orderBy('language', 'asc');
            })
            ->setColumns(
                //AdminColumn::text('tag_id')->setLabel('tag id'),
                AdminColumnEditable::text('name')->setLabel('Название категории'),
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
            AdminFormElement::text('name')->setName('nameEng')->setLabel('Название категории')->required()
        ]);
        $formRu = AdminForm::panel()->addBody([           
            AdminFormElement::text('name')->setName('nameRu')->setLabel('Название категории')->required()
        ]);
        $formRelations = AdminForm::panel()->addBody([         

            AdminFormElement::hidden('nameEng'),
            AdminFormElement::hidden('nameRu')
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($formEng, 'Категория новостей eng');
        $tabs->appendTab($formRu, 'Категория новостей ru');
        $tabs->appendTab($formRelations, 'Категория новостей другое');
        
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
