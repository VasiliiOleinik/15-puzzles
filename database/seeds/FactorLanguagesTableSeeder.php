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
            ['name' => 'Изменение метаболизма кислорода'],
            ['name' => 'Повреждение ДНК'],
            ['name' => 'Этиология'],
            ['name' => 'Помощь близким'],
            ['name' => 'Детоксикация'],
            ['name' => 'Напряжение ячейки'],
            ['name' => 'pH'],
            ['name' => 'Клеточный метаболизм'],
            ['name' => 'Распознавание раковых клеток иммунитетом'],
            ['name' => 'Реактивация иммунной системы'],
            ['name' => 'Восстановление соединительной ткани'],
            ['name' => 'Выделение раковых клеток'],
            ['name' => 'Свободный Радикальный стресс'],
            ['name' => 'Деление раковых клеток'],
            ['name' => 'Развитие кровеносных сосудов'],
            ['name' => 'Развитие кровеносных сосудов'],
            ['name' => 'Развитие кровеносных сосудов'],
            ['name' => 'Развитие кровеносных сосудов'],
            ['name' => 'Развитие кровеносных сосудов'],
            ['name' => 'Развитие кровеносных сосудов'],
            ['name' => 'Развитие кровеносных сосудов'],
            ['name' => 'Развитие кровеносных сосудов'],
        ];

        for($i = 0; $i < count($data); $i++){

            DB::table($table)
                ->where('id', $i + 1)
                ->update($data[$i]);
        }
    }
}
