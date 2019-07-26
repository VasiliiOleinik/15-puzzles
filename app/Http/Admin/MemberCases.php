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
 * Class MemberCases
 *
 * @property \App\Models\MemberCase $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class MemberCases extends Section implements Initializable
{
    /**
     * @var \App\Models\fundamentalSetting
     */
    protected $model = '\App\Models\MemberCase';

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
    protected $title = 'Истории болезней';

    /**
     * @var string
     */
    protected $alias = 'member_cases';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            //->with(['roles'])
            ->setColumns(
                AdminColumn::link('title')->setLabel('заголовок'),
                AdminColumn::text('status')->setLabel('статус'),
                AdminColumnEditable::checkbox('anonym')->setLabel('анонимная публикация'),
                AdminColumn::text('created_at')->setLabel('создано'),
                AdminColumn::relatedLink('user.nickname', 'пользователь', 'id'),
            )
             ->setFilters(
                AdminDisplayFilter::field('user_id')->setTitle('id пользователя [:value]')
            );   
        $display
            //поля поиска
            ->setColumnFilters(
            [   
                AdminColumnFilter::text()
                    ->setPlaceholder('Введите заголовок')
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS),
                AdminColumnFilter::text()
                    ->setPlaceholder('Введите статус')
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS),
                null,
                // Поиск по диапазону дат
                AdminColumnFilter::range()->setFrom(
                    AdminColumnFilter::date()->setPlaceholder('From Date')->setFormat('Y-m-d')
                )->setTo(
                    AdminColumnFilter::date()->setPlaceholder('To Date')->setFormat('Y-m-d')
                ),
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
        $image = '<img id="img-member-case" src="'.$this->model::find($id)->img.'" width="100%" style="max-width: 800px;">';
        //dd($this->model::find($id)->toJson());
        // поле var - нельзя редактировать, ибо нефиг системообразующий код редактировать
        return AdminForm::panel()->addBody([
            AdminFormElement::text('title')->setLabel('заголовок')->required(),
            AdminFormElement::select('status', 'статус')->setOptions(['show' => 'show', 'hide' => 'hide', 'moderating' => 'moderating']),
            AdminFormElement::checkbox('anonym')->setLabel('анонимная публикация'),
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($image) {
                    return $image;
                }),
            AdminFormElement::hidden('img')->setLabel('картинка')->required(),
            AdminFormElement::view('sleeping-owl.member-cases.test'),
            AdminFormElement::textarea('content', 'история болезни'),
            AdminFormElement::text('created_at')->setLabel('создано')->setReadonly(1),            
        ]); 
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        $image = '<img id="img-member-case" src="" width="100%" style="max-width: 800px;">';
        //$hidden = false;
        //dd($this->model::find($id)->toJson());
        // поле var - нельзя редактировать, ибо нефиг системообразующий код редактировать
        return AdminForm::panel()->addBody([
            AdminFormElement::text('title')->setLabel('заголовок')->required(),
            AdminFormElement::custom()
                ->setDisplay(function($instance) use($image) {
                    return $image;
                }),
            AdminFormElement::hidden('img')->setLabel('картинка')->required(),
            AdminFormElement::view('sleeping-owl.member-cases.test'),  
            AdminFormElement::select('status', 'статус')->setOptions(['show' => 'show', 'hide' => 'hide', 'moderating' => 'moderating'])
                                              ->setDefaultValue('moderating'),
            AdminFormElement::select('user_id', 'пользователь')->setModelForOptions(\App\Models\User\User::class)->setDisplay('nickname')
                                              ->setDefaultValue('1'),
            AdminFormElement::checkbox('anonym')->setLabel('анонимная публикация'),
            AdminFormElement::textarea('content', 'история болезни'),
        ]); 
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
