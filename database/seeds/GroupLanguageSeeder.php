<?php

use Illuminate\Database\Seeder;

class GroupLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = \App\Models\Group::all();

        \App\Models\GroupLanguage::create(['name'=>'ПРИЧИНЫ', 'language'=> 'ru', 'group_id'=>1]);
        \App\Models\GroupLanguage::create(['name'=>'УСЛОВИЯ', 'language'=> 'ru', 'group_id'=>2]);
        \App\Models\GroupLanguage::create(['name'=>'ЗАЩИТА', 'language'=> 'ru', 'group_id'=>3]);
        \App\Models\GroupLanguage::create(['name'=>'ОПАСНОСТИ', 'language'=> 'ru', 'group_id'=>4]);

        \App\Models\GroupLanguage::create(['name'=>'REASONS', 'language'=> 'eng', 'group_id'=>1]);
        \App\Models\GroupLanguage::create(['name'=>'CONDITIONS', 'language'=> 'eng', 'group_id'=>2]);
        \App\Models\GroupLanguage::create(['name'=>'DEFENCE', 'language'=> 'eng', 'group_id'=>3]);
        \App\Models\GroupLanguage::create(['name'=>'DANGERS', 'language'=> 'eng', 'group_id'=>4]);

    }
}





