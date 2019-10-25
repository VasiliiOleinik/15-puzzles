<?php

use Illuminate\Database\Seeder;

class TableNameLangColsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\NameLanguageCols::create([
            'cols_id'=>1,
            'language'=>'eng',
            'col1'=>'Name',
            'col2'=>'Groups of related factors',
            'col3'=>'Norm',
            'col4'=>'Patalogy',
            'col5'=>'Pathology correction methods',
            'col6'=>'Testing',
        ]);
        \App\Models\NameLanguageCols::create([
            'cols_id'=>1,
            'language'=>'ru',
            'col1'=>'Имя',
            'col2'=>'Группы связанных факторов',
            'col3'=>'Нормальное состояние',
            'col4'=>'Паталогия',
            'col5'=>'Методы коррекции патологии',
            'col6'=>'Анализы',
        ]);
    }
}
