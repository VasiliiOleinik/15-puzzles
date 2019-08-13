<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use App\Models\Article\Article;

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
 * Class ArticleLanguages
 *
 * @property \App\Models\Article\ArticleLanguage $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class ArticleLanguages extends Section implements Initializable
{
    protected $model = '\App\Models\Article\ArtileLanguage';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return Article::count();
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
    protected $title = 'Статьи';

    /**
     * @var string
     */
    protected $alias = 'articleLanguages';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        
        $display = AdminDisplay::datatablesAsync();
        $display
            ->with(['article'])
            ->setColumns(
                AdminColumn::text('article_id')->setLabel('article id'),
                AdminColumnEditable::text('title')->setLabel('Название статьи'),
                AdminColumnEditable::textarea('description')->setLabel('Краткое описание статьи'),                
                AdminColumnEditable::textarea('content')->setLabel('Полное описание статьи')
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
        $image = '<img id="img-admin" src="'.Article::find($id)->img.'" width="100%" style="max-width: 800px;">';
        return AdminForm::panel()->addBody([
            AdminFormElement::text('title')->setLabel('Название статьи')->required(),
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($image) {
                    return $image;
                }),
            AdminFormElement::hidden('img')->setLabel('Картинка'),
            AdminFormElement::view('sleeping-owl.input-type-file'),
            AdminFormElement::textarea('description', 'Краткое описание статьи'),
            AdminFormElement::textarea('content', 'Полное описание статьи'),
            AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1)       
        ]); 
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
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
