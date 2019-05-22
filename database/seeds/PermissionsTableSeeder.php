<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = [
            ['id' => 1, 'name' => 'add_case'],
            ['id' => 2, 'name' => 'comment'],
			['id' => 3, 'name' => 'admin'],
        ];
		
		Permission::insert($permissions);
    }
}
