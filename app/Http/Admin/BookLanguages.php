<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use App\Models\Book\Book;

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
 * Class BookLanguages
 *
 * @property \App\Models\Book\BookLanguage $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class BookLanguages extends Section
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
    protected $title = 'Литература';

    /**
     * @var string
     */
    protected $alias = 'literature';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['book'])
            ->setColumns(
                AdminColumn::text('book_id')->setLabel('book_id'),
                AdminColumnEditable::text('title')->setLabel('Название книги'),
                AdminColumnEditable::textarea('description')->setLabel('Краткое описание книги'),                
                AdminColumnEditable::text('author')->setLabel('Автор книги'),
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
        $imageSrc = Book::find( $this->model::find($id)->book_id )->img;
        $image = '<img id="img-admin" src="'.$imageSrc.'" width="100%" style="max-width: 350px;">';
        return AdminForm::panel()->addBody([
            AdminFormElement::text('title')->setLabel('Название книги')->setReadonly(1),
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($image) {
                    return $image;
                }),
            AdminFormElement::hidden('img')->setLabel('Картинка'),
            AdminFormElement::view('sleeping-owl.input-type-file'),
            AdminFormElement::multiselect('book.linksForBooks', 'Магазины где продается эта книга')->setModelForOptions(\App\Models\Book\LinkForBooks::class)->setDisplay('title')
        ]); 
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        Config::set('app.locale', 'eng');
        $image = '<img id="img-admin" width="30%" style="max-width: 350px;">';               

        //Эти скрипты делают возможным отправку всех нужных полей форм с трех табов
        //(заполняются hidden поля на вкладке связей)
        $scripts = "<script src='/js/backend/admin-books.js')></script>";        

        $formEng = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($scripts) {
                    return $scripts;
                }),
            AdminFormElement::text('title')->setName('titleEng')->setLabel('Название книги')->required(),
            AdminFormElement::textarea('description')->setName('descriptionEng')->setLabel('Краткое описание книги')->required(),
            AdminFormElement::textarea('author')->setName('authorEng')->setLabel('Автор книги')->required()
        ]);
        $formRu = AdminForm::panel()->addBody([           
            AdminFormElement::text('title')->setName('titleRu')->setLabel('Название книги')->required(),
            AdminFormElement::textarea('description')->setName('descriptionRu')->setLabel('Краткое описание книги')->required(),
            AdminFormElement::textarea('content')->setName('authorRu')->setLabel('Автор книги')->required()
        ]);
        $formRelations = AdminForm::panel()->addBody([
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($image) {
                    return $image;
                }),
            AdminFormElement::hidden('img')->setLabel('картинка'),
            AdminFormElement::view('sleeping-owl.input-type-file'),
            AdminFormElement::multiselect('book.linksForBooks', 'Магазины где продается эта книга')->setModelForOptions(\App\Models\Book\LinkForBooks::class)->setDisplay('title'),

            AdminFormElement::hidden('titleEng'),
            AdminFormElement::hidden('descriptionEng'),
            AdminFormElement::hidden('authorEng'),
            AdminFormElement::hidden('titleRu'),
            AdminFormElement::hidden('descriptionRu'),
            AdminFormElement::hidden('authorRu')
        ]);

        $tabs = AdminDisplay::tabbed();
        $tabs->appendTab($formEng, 'Книга eng');
        $tabs->appendTab($formRu, 'Книга ru');
        $tabs->appendTab($formRelations, 'Книга другое');
        
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
