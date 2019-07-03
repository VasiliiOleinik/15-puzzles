<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();
        DB::update("ALTER TABLE types AUTO_INCREMENT = 0;");

        factory(Type::class, 4)->create();        

        $names = [
            ['name' => 'reasons'],
            ['name' => 'conditions'],
			['name' => 'defence'],
            ['name' => 'dangers'],
        ];

        for($i = 0; $i < count($names); $i++){

            DB::table('types')
                ->where('id', $i + 1)
                ->update($names[$i]);
        }
    }
}
