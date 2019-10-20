<?php

use Illuminate\Database\Seeder;
use App\Models\MedicalHistory;

class MedicalHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medical_histories')->delete();
        DB::update("ALTER TABLE medical_histories AUTO_INCREMENT = 0;");

        factory(MedicalHistory::class, 2)->create();
    }
}
