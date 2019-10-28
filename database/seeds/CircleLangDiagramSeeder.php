<?php

use Illuminate\Database\Seeder;

class CircleLangDiagramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CircleLangDiagram::create([
            'circle_diagram_name' => 'organ',
            'language' => 'eng',
            'name_target' => 'target organ'
        ]);
        \App\Models\CircleLangDiagram::create([
            'circle_diagram_name'=>'organ_system',
            'language' => 'eng',
            'name_target' => 'target organ system'
        ]);
        \App\Models\CircleLangDiagram::create([
            'circle_diagram_name'=> 'matrix',
            'language' => 'eng',
            'name_target' => 'target matrix'
        ]);
        \App\Models\CircleLangDiagram::create([
            'circle_diagram_name'=> 'cell',
            'language' => 'eng',
            'name_target' => 'target cell'
        ]);

        \App\Models\CircleLangDiagram::create([
            'circle_diagram_name' => 'organ',
            'language' => 'ru',
            'name_target' => 'цель орган'
        ]);
        \App\Models\CircleLangDiagram::create([
            'circle_diagram_name'=> 'organ_system',
            'language' => 'ru',
            'name_target' => 'цель система органов'
        ]);
        \App\Models\CircleLangDiagram::create([
            'circle_diagram_name'=> 'matrix',
            'language' => 'ru',
            'name_target' => 'цель matrix'
        ]);
        \App\Models\CircleLangDiagram::create([
            'circle_diagram_name'=> 'cell',
            'language' => 'ru',
            'name_target' => 'цель клетка'
        ]);
    }
}
