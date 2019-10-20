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

        factory(Type::class, 2)->create();

        $img = [
            ['img' => '/img/svg/oxygen_metabolism.svg'],
            ['img' => '/img/svg/dna.svg'],
        ];
    }
}
