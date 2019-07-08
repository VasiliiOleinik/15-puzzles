<?php

use Illuminate\Database\Seeder;
use App\Models\Category\CategoryForBooks;
use App\Models\Book\Book;

class CategoriesForBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = 'categories_for_books';
        DB::table($tableName)->delete();
        DB::update("ALTER TABLE ".$tableName." AUTO_INCREMENT = 0;");  
        
        $countModel = 8;
        factory(CategoryForBooks::class, $countModel)->create();
       
    }
}
