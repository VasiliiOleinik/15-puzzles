<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {       
		$this->call(RolesTableSeeder::class);
		$this->call(PermissionsTableSeeder::class);
		$this->call(RolePermissionsTableSeeder::class);

		$this->call(UsersTableSeeder::class);

        $this->call(TypesTableSeeder::class);
        $this->call(EvidencesTableSeeder::class);

        $this->call(MemberCasesTableSeeder::class);

        $this->call(MethodsTableSeeder::class);

        $this->call(FactorsTableSeeder::class);
        $this->call(DiseasesTableSeeder::class);
        $this->call(ProtocolsTableSeeder::class);
        $this->call(RemediesTableSeeder::class);
        $this->call(MarkersTableSeeder::class);
        

        $this->call(TagsTableSeeder::class);
        $this->call(CategoriesForNewsTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);        

        $this->call(CategoriesForBooksTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(LinksForBooksTableSeeder::class);
        
    }
}
