<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::update("ALTER TABLE categories AUTO_INCREMENT = 0;");

        factory(Category::class, 4)->create();        

        $names = [
            ['name' => 'reasons'],
            ['name' => 'conditions'],
			['name' => 'defence'],
            ['name' => 'dangers'],
        ];

        for($i = 0; $i < count($names); $i++){

            DB::table('categories')
                ->where('id', $i + 1)
                ->update($names[$i]);
        }
    }
}
