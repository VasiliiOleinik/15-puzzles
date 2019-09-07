<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use App\Models\Question;

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
 * Class QuestionLanguages
 *
 * @property \App\Models\QuestionLanguage $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class QuestionLanguages extends Section implements Initializable
{
    protected $model = '\App\Models\Book\BookLanguage';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        /*// Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return Book::count();
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
    protected $title = 'Faq';

    /**
     * @var string
     */
    protected $alias = 'faq';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        Cache::forget('question_eng');
        Cache::forget('question_ru');
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['question'])
            ->setColumns(
                //AdminColumn::text('question_id')->setLabel('question_id'),
                AdminColumnEditable::text('name')->setLabel('Название вопроса'),
                AdminColumnEditable::textarea('content')->setLabel('Ответ'),                
                AdminColumn::text('language')->setLabel('Язык')
            )
            ->setApply(function($query) {
                $query->orderBy('question_id', 'desc');
            });

        return $display->setView( view('sleeping-owl.display.table-title-description-scripts', ['view' => 'faq'] ) );
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        Config::set('app.locale', 'eng');

        //Эти скрипты делают возможным отправку всех нужных полей форм с трех табов
        //(заполняются hidden поля на вкладке связей)
        $scripts = "<script src='/js/backend/admin-faq.js')></script>";        

        $formEng = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($scripts) {
                    return $scripts;
                }),
            AdminFormElement::text('title')->setName('titleEng')->setLabel('Название вопроса')->required(),
            AdminFormElement::textarea('content')->setName('contentEng')->setLabel('Ответ')->required(),           
        ]);
        $formRu = AdminForm::panel()->addBody([           
            AdminFormElement::text('title')->setName('titleRu')->setLabel('Название вопроса')->required(),
            AdminFormElement::textarea('content')->setName('contentRu')->setLabel('Ответ')->required()
        ]);
        $formRelations = AdminForm::panel()->addBody([            

            AdminFormElement::hidden('titleEng'),
            AdminFormElement::hidden('contentEng'),
            AdminFormElement::hidden('titleRu'),
            AdminFormElement::hidden('contentRu'),
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($formEng, 'FAQ eng');
        $tabs->appendTab($formRu, 'FAQ ru');
        $tabs->appendTab($formRelations, 'FAQ другое');
        
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
