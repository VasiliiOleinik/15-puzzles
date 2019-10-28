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
        $this->call(FilesTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);

        $this->call(UsersTableSeeder::class);

        $this->call(TypesTableSeeder::class);
        $this->call(EvidencesTableSeeder::class);

        $this->call(MethodsTableSeeder::class);
        $this->call(MethodLanguagesTableSeeder::class);

        $this->call(FactorsTableSeeder::class);
        $this->call(FactorLanguagesTableSeeder::class);
        $this->call(DiseasesTableSeeder::class);
        $this->call(DiseaseLanguagesTableSeeder::class);
        $this->call(ProtocolsTableSeeder::class);
        $this->call(ProtocolLanguagesTableSeeder::class);
        $this->call(RemediesTableSeeder::class);
        $this->call(RemedyLanguagesTableSeeder::class);
        $this->call(MarkersTableSeeder::class);
        $this->call(MarkerLanguagesTableSeeder::class);


        $this->call(TagsTableSeeder::class);
        $this->call(MemberCasesTableSeeder::class);
        $this->call(MemberCaseLanguagesTableSeeder::class);
        $this->call(CategoriesForNewsTableSeeder::class);
        $this->call(CategoryForNewsLanguagesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ArticleLanguagesTableSeeder::class);

        $this->call(QuestionsTableSeeder::class);
        $this->call(QuestionLanguagesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(MedicalHistoriesTableSeeder::class);

        $this->call(CategoriesForBooksTableSeeder::class);
        $this->call(CategoryForBooksLanguagesTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(BookLanguagesTableSeeder::class);
        $this->call(LinksForBooksTableSeeder::class);
        $this->call(LaboratoriesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(OptionSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(TypeLanguageSeeder::class);
        $this->call(OrgansSeeder::class);
        $this->call(SocialSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(GroupLanguageSeeder::class);

        $this->call(PoliceTableSeeder::class);
        $this->call(FooterSeeder::class);
        $this->call(FooterLangSeeder::class);

        $this->call(TableNameColsSeeder::class);
        $this->call(TableNameLangColsSeeder::class);
        $this->call(CircleDiagramSeeder::class);
        $this->call(CircleLangDiagramSeeder::class);

    }
}
