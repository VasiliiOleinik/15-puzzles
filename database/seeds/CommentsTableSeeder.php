<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        DB::update("ALTER TABLE comments AUTO_INCREMENT = 0;");

        factory(Comment::class, 2)->create();
    }
}
