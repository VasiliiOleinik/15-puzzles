<?php

use Illuminate\Database\Seeder;
use App\Models\Factor\Factor;
use App\Models\Factor\FactorLanguage;

class FactorLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'factor_languages';
        DB::table($table)->delete();
        DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

        for($i = 0; $i < Factor::count()*2; $i++){
            factory(FactorLanguage::class, 1 )->create();
        }

        $data = [
            //eng
            ['name' => 'Oxygen metabolism change'],
            ['name' => 'DNA damage'],
			['name' => 'Etiology'],
            ['name' => 'Looking up'],
            ['name' => 'Detox'],
            ['name' => 'Cell voltage'],
            ['name' => 'pH'],
            ['name' => 'Cellular metabolism'],
            ['name' => 'Cancer cell recognition by immune system'],
            ['name' => 'Reactivation of immune system'],
            ['name' => 'Connective tissue recovery'],
            ['name' => 'Cancer cell ellimination'],
            ['name' => 'Free Radical stress'],
            ['name' => 'Cancer cell division'],
            ['name' => 'Angiogenesis'],
            ['name' => 'Angiogenesis'],
            ['name' => 'Angiogenesis'],
            ['name' => 'Angiogenesis'],
            ['name' => 'Angiogenesis'],
            ['name' => 'Angiogenesis'],
            ['name' => 'Angiogenesis'],
            ['name' => 'Angiogenesis'],
            //ru
            ['name' => 'Изменение метаболизма кислорода', 'factor_id' => 1, 'type_id' => 1],
            ['name' => 'Повреждение ДНК', 'factor_id' => 2, 'type_id' => 1],
            ['name' => 'Этиология', 'factor_id' => 3, 'type_id' => 1],
            ['name' => 'Помощь близким', 'factor_id' => 4, 'type_id' => 3],
            ['name' => 'Детоксикация', 'factor_id' => 5, 'type_id' => 2],
            ['name' => 'Напряжение ячейки', 'factor_id' => 6, 'type_id' => 2],
            ['name' => 'pH', 'factor_id' => 7, 'type_id' => 2],
            ['name' => 'Клеточный метаболизм', 'factor_id' => 8, 'type_id' => 2],
            ['name' => 'Распознавание раковых клеток иммунитетом', 'factor_id' => 9, 'type_id' => 3],
            ['name' => 'Реактивация иммунной системы', 'factor_id' => 10, 'type_id' => 3],
            ['name' => 'Восстановление соединительной ткани', 'factor_id' => 11, 'type_id' => 3],
            ['name' => 'Выделение раковых клеток', 'factor_id' => 12, 'type_id' => 3],
            ['name' => 'Свободный Радикальный стресс', 'factor_id' => 13, 'type_id' => 4],
            ['name' => 'Деление раковых клеток', 'factor_id' => 14, 'type_id' => 4],
            ['name' => 'Развитие кровеносных сосудов', 'factor_id' => 15, 'type_id' => 4],
            ['name' => 'Развитие кровеносных сосудов', 'factor_id' => 16, 'type_id' => 4],
            ['name' => 'Развитие кровеносных сосудов', 'factor_id' => 17, 'type_id' => 4],
            ['name' => 'Развитие кровеносных сосудов', 'factor_id' => 18, 'type_id' => 4],
            ['name' => 'Развитие кровеносных сосудов', 'factor_id' => 19, 'type_id' => 4],
            ['name' => 'Развитие кровеносных сосудов', 'factor_id' => 20, 'type_id' => 4],
            ['name' => 'Развитие кровеносных сосудов', 'factor_id' => 21, 'type_id' => 4],
            ['name' => 'Развитие кровеносных сосудов', 'factor_id' => 22, 'type_id' => 4],
        ];

        for($i = 0; $i < count($data); $i++){

            DB::table($table)
                ->where('id', $i + 1)
                ->update($data[$i]);
        }
    }
}
