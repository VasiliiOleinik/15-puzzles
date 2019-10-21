<?php

use Illuminate\Database\Seeder;
use App\Models\MemberCase;
use App\Models\Tag;

class MemberCasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_cases')->delete();
        DB::update("ALTER TABLE member_cases AUTO_INCREMENT = 0;");

        //factory(MemberCase::class, 2)->create();
        factory(MemberCase::class, 5)->create();

        $tags = Tag::all();

        // Populate the pivot table
        MemberCase::all()->each(function ($memberCase) use ($tags) {
            $memberCase->tags()->attach(
                $tags->random(
                    rand(1,  2))->pluck('id')->toArray()

            );
        });
    }
}
