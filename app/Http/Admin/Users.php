<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use AdminColumn;
use AdminColumnFilter;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;
use Illuminate\Support\Facades\Config;

/**
 * Class Users
 *
 * @property \App\Models\User\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Users extends Section implements Initializable
{
    /**
     * @var \App\Models\fundamentalSetting
     */
    protected $model = '\App\Models\User\User';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        // Добавление пункта меню и счетчика кол-ва записей в разделе
        $this->addToNavigation($priority = 500, function() {
            return \App\Models\User\User::count();
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
    protected $title = 'Пользователи';

    /**
     * @var string
     */
    protected $alias = 'users';

    /**
     * @return DisplayInterface
     */
    /*public function onDisplay()
    {
        
        $display = AdminDisplay::table()
            ->setHtmlAttribute('class', 'table-primary')
            ->setFilters(
                AdminDisplayFilter::field('nickname')->setTitle('логин [:value]')
            )            
            ->setColumns(
                AdminColumn::text('id', '#')->setWidth('30px'),
                AdminColumn::link('nickname', 'логин')->setWidth('200px'),
                AdminColumn::text('first_name', 'имя'),
                AdminColumn::text('middle_name', 'фамилия'),
                AdminColumn::text('last_name', 'отчество'),
                AdminColumn::text('email', 'почта'),
                AdminColumn::text('birthday', 'дата рождения'),                
            )            
            ->paginate(20);
            
        return $display->setView(view('sleeping_owl.display.table'));
    }*/

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            //->with(['roles'])
            ->setColumns(
                AdminColumn::link('nickname')->setLabel('логин'),
                AdminColumn::text('first_name')->setLabel('имя'),
                AdminColumn::text('middle_name')->setLabel('фамилия'),
                AdminColumn::text('last_name')->setLabel('отчество'),
                AdminColumn::text('email')->setLabel('почта'),
                AdminColumn::text('birthday')->setLabel('дата рождения')
            );
        $display
            //поля поиска
            ->setColumnFilters(
            [   
                AdminColumnFilter::text()
                    ->setPlaceholder('Введите логин')
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS),
                AdminColumnFilter::text()
                    ->setPlaceholder('Введите имя')
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS),
                AdminColumnFilter::text()
                    ->setPlaceholder('Введите фамилию')
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS),
                AdminColumnFilter::text()
                    ->setPlaceholder('Введите отчество')
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS),
                AdminColumnFilter::text()
                    ->setPlaceholder('Введите почту')
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS),
                // Поиск по диапазону дат
                AdminColumnFilter::range()->setFrom(
                    AdminColumnFilter::date()->setPlaceholder('From Date')->setFormat('d.m.Y')
                )->setTo(
                    AdminColumnFilter::date()->setPlaceholder('To Date')->setFormat('d.m.Y')
                )
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
        Config::set('app.locale', 'en');
        $avatar = '<img src="'.$this->model::find($id)->img.'" width="100%" style="max-width: 800px;">';
        //dd($this->model::find($id)->toJson());
        // поле var - нельзя редактировать, ибо нефиг системообразующий код редактировать
        return AdminForm::panel()->addBody([            
            AdminFormElement::text('nickname', 'логин')->required(),
            AdminFormElement::text('first_name', 'имя'),
            AdminFormElement::text('middle_name', 'фамилия'),
            AdminFormElement::text('last_name', 'отчество'),
            AdminFormElement::custom()
                    ->setDisplay(function($instance) use($avatar) {
                        return $avatar;
                    }),
            AdminFormElement::text('email', 'почта')->required(),
            AdminFormElement::text('birthday', 'дата рождения'),
            //AdminFormElement::wysiwyg('test', 'Text'),
            AdminFormElement::ckeditor('middle_name', 'Комментарий автора', 'simplemde')
                ->setFilteredValueToField('text_html'),
            AdminFormElement::text('id', 'ID')->setReadonly(1),
            AdminFormElement::text('created_at')->setLabel('Создано')->setReadonly(1)                       
        ]); 
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        //return $this->onEdit(null);
        // а вот создать var можно. Один раз и навсегда
        return AdminForm::panel()->addBody([
            AdminFormElement::text('nickname', 'логин')->required(),
            AdminFormElement::text('first_name', 'имя'),
            AdminFormElement::text('middle_name', 'фамилия'),
            AdminFormElement::text('last_name', 'отчество'),
            AdminFormElement::text('email', 'почта')->required(),
            AdminFormElement::text('birthday', 'дата рождения')

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

     //заголовок для создания записи
    public function getCreateTitle()
    {
        return 'Создание пользователя';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-gear';
    }
}
