<?php

use Illuminate\Database\Seeder;
use App\Models\Category\CategoryForBooks;
use App\Models\Book\Book;
use App\Models\Tag;

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

        $tags = Tag::all();
        $categoriesForBooks = CategoryForBooks::all();

        // Populate the pivot table
        Book::all()->each(function ($book) use ($tags) { 
            $book->tags()->sync(
                $tags->random(
                    rand(6,  22))->pluck('id')->toArray()
                
            ); 
        });

        // Populate the pivot table
        Book::all()->each(function ($book) use ($categoriesForBooks) { 
            $book->categoriesForBooks()->sync(
                $categoriesForBooks->random(
                    rand(1,  3))->pluck('id')->toArray()
                
            ); 
        });
    }
}
