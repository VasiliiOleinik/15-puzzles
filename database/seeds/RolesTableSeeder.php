<?php

use Illuminate\Database\Seeder;
use App\Models\Role\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $roles = [
            ['id' => 1, 'name' => 'registered'],
            ['id' => 2, 'name' => 'admin'],
			['id' => 3, 'name' => 'doctor'],
        ];
		
		Role::insert($roles);
    }
}
