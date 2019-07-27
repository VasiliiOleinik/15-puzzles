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

/**
 * Class Comments
 *
 * @property \App\Models\Comment $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Comments extends Section implements Initializable
{
    /**
     * @var \App\Models\fundamentalSetting
     */
    protected $model = '\App\Models\Comment';

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
    protected $title = 'Комментарии';

    /**
     * @var string
     */
    protected $alias = 'comments';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            //->with(['roles'])
            ->setColumns(
                AdminColumn::link('content')->setLabel('комментарий'),
                AdminColumn::text('created_at')->setLabel('создано'),
                AdminColumn::relatedLink('memberCase.title', 'история болезни', 'id'),                
                AdminColumn::relatedLink('user.nickname', 'пользователь', 'id')
            )
             ->setFilters(
                AdminDisplayFilter::field('user_id')->setTitle('id пользователя [:value]')
            );   
        $display
            //поля поиска
            ->setColumnFilters(
            [
                null,
                // Поиск по диапазону дат
                AdminColumnFilter::range()->setFrom(
                    AdminColumnFilter::date()->setPlaceholder('From Date')->setFormat('Y-m-d')
                )->setTo(
                    AdminColumnFilter::date()->setPlaceholder('To Date')->setFormat('Y-m-d')
                ),
                AdminColumnFilter::text()
                    ->setPlaceholder('Заголовок истории болезни')
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS),           
                AdminColumnFilter::text()
                    ->setPlaceholder('Введите логин юзера')
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS),
            ]
            );
        $display->getColumnFilters()->setPlacement('table.header');
        
        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {        
        $form = AdminForm::panel()->addBody([
            AdminFormElement::textarea('content')->setLabel('комментарий')->required(),
            AdminFormElement::text('created_at')->setLabel('создано')->setReadonly(1),            
        ]);
        /*
        if (!is_null($id)) { // Если есть ID
            $display = AdminDisplay::table()
               ->setModelClass(\App\Models\User\User::class) // Обязательно необходимо указать класс модели;
               ->setApply(function($query) use($id) {
                    $query->where('user_id','=', $this->model->user_id); // Фильтруем список                 
                })
            ;
        
        $form->addBody($display);
        }
        */
        return $form;
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
