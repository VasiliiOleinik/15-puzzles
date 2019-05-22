<?php

use Illuminate\Database\Seeder;
use App\Models\Role\RolePermission;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_permissions')->delete();

         $role_permissions = [
             ['id' => 1, 'role_id' => 1, 'permission_id' => 1 ],
			 ['id' => 2, 'role_id' => 1, 'permission_id' => 2 ],
             ['id' => 3, 'role_id' => 2, 'permission_id' => 3 ],
			 ['id' => 4, 'role_id' => 3, 'permission_id' => 2 ]
         ];
		
		RolePermission::insert($role_permissions);
    }
}
