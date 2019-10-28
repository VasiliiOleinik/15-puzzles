<?php

use Illuminate\Database\Seeder;

class CircleDiagramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CircleDiagram::create([
            'img' => '/img/diagram_ico/bg-grey.jpg',
            'name' => 'organ_system',
            'status' => 'default',
        ]);

        \App\Models\CircleDiagram::create([
            'img' => '/img/diagram_ico/bg-color.jpg',
            'name' => 'organ_system',
            'status' => 'color',
        ]);

        \App\Models\CircleDiagram::create([
            'img' => '/img/diagram_ico/organ-grey.png',
            'name' => 'organ',
            'status' => 'default',
        ]);

        \App\Models\CircleDiagram::create([
            'img' => '/img/diagram_ico/organ-color.png',
            'name' => 'organ',
            'status' => 'color',
        ]);

        \App\Models\CircleDiagram::create([
            'img' => '/img/diagram_ico/matrix-grey.png',
            'name' => 'matrix',
            'status' => 'default',
        ]);

        \App\Models\CircleDiagram::create([
            'img' => '/img/diagram_ico/matrix-color.png',
            'name' => 'matrix',
            'status' => 'color',
        ]);

        \App\Models\CircleDiagram::create([
            'img' => '/img/diagram_ico/cell-grey.png',
            'name' => 'cell',
            'status' => 'default',
        ]);

        \App\Models\CircleDiagram::create([
            'img' => '/img/diagram_ico/cell-color.png',
            'name' => 'cell',
            'status' => 'color',
        ]);
    }
}
