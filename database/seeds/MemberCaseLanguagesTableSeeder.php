<?php

use Illuminate\Database\Seeder;
use App\Models\MemberCase;
use App\Models\MemberCaseLanguage;
use Illuminate\Support\Facades\Config;

class MemberCaseLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableShort = 'member_case';
        $table = $tableShort.'_languages';
        DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

        Config::set('app.faker_locale', 'en_US');
        for($i = 0; $i < MemberCase::count(); $i++){
            $memberCase = factory(MemberCaseLanguage::class, 1 )->create();
            $memberCase[0]->memberCase->alias = URLify::filter($memberCase[0]->title.' '.$memberCase[0]->memberCase->created_at.' '.$memberCase[0]->memberCase->id, 190);
            $memberCase[0]->memberCase->save();
        }
        Config::set('app.faker_locale', 'ru_RU');
        for($i = 0; $i < MemberCase::count(); $i++){
            factory(MemberCaseLanguage::class, 1 )->create();
        }
        for($i = MemberCase::count() + 1; $i < MemberCase::count()*2 + 1; $i++){
            DB::table($table)
                ->where('id', $i)
                ->update( [$tableShort.'_id' => $i - MemberCase::count()] );
        }
    }
}
