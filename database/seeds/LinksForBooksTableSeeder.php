<?php

use Illuminate\Database\Seeder;
use App\Models\Book\LinkForBooks;
use App\Models\Book\Book;

class LinksForBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = 'links_for_books';
        DB::table($tableName)->delete();
        DB::update("ALTER TABLE ".$tableName." AUTO_INCREMENT = 0;");     

        $data = [
            ['title' => '145 Country Club Dr, Rockwall, TX, 75032'],
            ['title' => '707 13th St SE #275, Salem, OR, 97301'],
            ['title' => '10869 Alana Ct, Willis, MI, 48191'],
            ['title' => '289 Mount Hope Ave #M10, Dover, NJ, 07801'],
        ];

        $countModels = count($data);
        factory(LinkForBooks::class, $countModels )->create();        
           
        for($i = 0; $i < count($data); $i++){
            DB::table($tableName)
                ->where('id', $i + 1)
                ->update($data[$i]);
        }

        //pivot table
        $linksForBooks = LinkForBooks::all();
        $books = Book::with('linksForBooks')->get();
        foreach ($books as $book) {
            $book->linksForBooks()->attach($linksForBooks->random( rand(1,  $countModels  ) ) );
        }
    }
}
