<?php

use Illuminate\Database\Seeder;
use App\Models\Book\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->delete();
        DB::update("ALTER TABLE books AUTO_INCREMENT = 0;");

        factory(Book::class, 17)->create();
    }
}
