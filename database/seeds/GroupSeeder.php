<?php

use Illuminate\Database\Seeder;
use App\Models\Group;
class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Group::class, 4)->create();

        $factors = \App\Models\Factor\Factor::all();
        $groups = Group::all();

        foreach ($groups as $group){

            $group->factors()->attach($factors->random(1,2));
        }
    }
}
