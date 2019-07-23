<?php

use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //clear files directory
        File::deleteDirectory( public_path( "files/users_id" ) );
    }
}
