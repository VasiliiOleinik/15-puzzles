<?php

use Illuminate\Database\Seeder;
use App\Models\Protocol\Protocol;
use App\Models\Protocol\ProtocolLanguage;
use Illuminate\Support\Facades\Config;

class ProtocolLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableShort = 'protocol';
        $table = 'protocol_languages';
        DB::update("ALTER TABLE ".$table." AUTO_INCREMENT = 0;");

        Config::set('app.faker_locale', 'en_US');        
        for($i = 0; $i < Protocol::count(); $i++){
            factory(ProtocolLanguage::class, 1 )->create();
        }
        Config::set('app.faker_locale', 'ru_RU');        
        for($i = 0; $i < Protocol::count(); $i++){
            factory(ProtocolLanguage::class, 1 )->create();
        }
        for($i = Protocol::count() + 1; $i < Protocol::count()*2 + 1; $i++){
            DB::table($table)
                ->where('id', $i)
                ->update( [$tableShort.'_id' => $i - Protocol::count(), 'evidence_id' => Protocol::find($i - Protocol::count())->evidence_id] );
        }
        //делаем одинаковыми имена
        foreach(Protocol::all() as $protocol){
            $protocol->name = ProtocolLanguage::where('protocol_id','=',$protocol->id)
                                          ->where('language','=','eng')->first()->name;
            $protocol->save();
        }
    }
}
