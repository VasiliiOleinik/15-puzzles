<?php

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->delete();
        DB::update("ALTER TABLE questions AUTO_INCREMENT = 0;");

        factory(Question::class, 2)->create();
    }
}
