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
use Illuminate\Support\Facades\Config;

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
    protected $alias = 'member-cases';

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display
            //->with(['roles'])
            ->setColumns(
                AdminColumnEditable::text('casesRu.title')->setLabel('заголовок'),
                AdminColumn::text('status')->setLabel('статус')
                    ->setOrderable(false),
                AdminColumnEditable::checkbox('anonym')->setLabel('анонимная публикация')
                    ->setOrderable(false),
                AdminColumn::text('created_at')->setLabel('создано')
                    ->setOrderable(false),
                AdminColumn::relatedLink('user.nickname', 'пользователь')
                    ->setOrderable(false)
            )
            ->setApply(function($query) {
                $query->orderBy('created_at', 'desc');
            })
            //->setApply(function($query) { $query->orderBy('created_at', 'desc') })
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
                    ->setOperator(\SleepingOwl\Admin\Display\Filter\FilterBase::CONTAINS)
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
        $rules = ['required', 'string', 'max:191'];
        $columns1 = \AdminFormElement::columns([
            [
                AdminFormElement::text('title')->setLabel('Title ENG')->setValidationRules($rules),
                AdminFormElement::textarea('description')->setLabel('Описание ENG')->setValidationRules($rules),
                AdminFormElement::textarea('content', 'история болезни ENG'),

            ],
            [
                AdminFormElement::text('casesRu.title')->setLabel('Title RU')->setValidationRules($rules),
                AdminFormElement::textarea('casesRu.description')->setLabel('Описание RU')->setValidationRules($rules),
                AdminFormElement::textarea('casesRu.content', 'история болезни RU'),
            ]
        ]);
        $columns2 = \AdminFormElement::columns([
            [
                AdminFormElement::select('status', 'статус')->setOptions(['show' => 'show', 'hide' => 'hide', 'moderating' => 'moderating']),
                AdminFormElement::text('user.nickname')->setLabel('пользователь')->setReadonly(1),
                AdminFormElement::checkbox('anonym')->setLabel('анонимная публикация'),
                AdminFormElement::image('img')->setLabel('картинка'),

                AdminFormElement::multiselect('tags', 'Тэги этой истории болезни')->setModelForOptions(\App\Models\Tag::class)->setDisplay('name'),
                AdminFormElement::text('created_at')->setLabel('создано')->setReadonly(1)
            ]
        ]);
        return AdminForm::panel()->addBody([
            $columns1,
            $columns2
        ]);
    }

    /**
     * @return FormInterface
     */
    //TODO доделать
//    public function onCreate()
//    {
//        $rules = ['required', 'string', 'max:191'];
//
//        $ckeditor = view('sleeping-owl.pages.layout');
//        $image = '<img id="img-admin" src="" width="100%" style="max-width: 800px;">';
//        return AdminForm::panel()->addBody([
//            AdminFormElement::custom()
//                ->setDisplay(function($instance) use($ckeditor) {
//                    return $ckeditor;
//            }),
//            AdminFormElement::text('title')->setLabel('заголовок')->setValidationRules($rules),
//            AdminFormElement::text('description')->setLabel('описание')->setValidationRules($rules),
//            AdminFormElement::custom()
//                ->setDisplay(function($instance) use($image) {
//                    return $image;
//                }),
//            AdminFormElement::hidden('img')->setLabel('картинка'),
//            AdminFormElement::view('sleeping-owl.member-cases.test'),
//            AdminFormElement::select('status', 'статус')->setOptions(['show' => 'show', 'hide' => 'hide', 'moderating' => 'moderating'])
//                                              ->setDefaultValue('moderating'),
//            AdminFormElement::select('user_id', 'пользователь')->setModelForOptions(\App\Models\User\User::class)->setDisplay('nickname')
//                                              ->setDefaultValue('1'),
//            AdminFormElement::checkbox('anonym')->setLabel('анонимная публикация'),
//            AdminFormElement::textarea('content', 'история болезни'),
//            AdminFormElement::multiselect('tags', 'Тэги этой истории болезни')->setModelForOptions(\App\Models\Tag::class)->setDisplay('name')
//        ]);
//    }

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
        return 'Создание истории болезни';
    }

    // иконка для пункта меню - шестеренка
    public function getIcon()
    {
        return 'fa fa-address-card';
    }
}
