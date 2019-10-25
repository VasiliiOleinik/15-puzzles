<?php

use Illuminate\Database\Seeder;

class FooterLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\FooterLang::create([
            'language' => 'eng',
            "footer_id" => 1,
            'disclaimer' => 'None of the above-stated protocols o r supplements have been evaluated or approved by FDA to diagnose or treat cancer. The website collects and presents information "as-is" about protocols used and developed by third-party individual doctors or scientific organizations worldwide, who did not undergo formal 1-2-3 stage clinical trials required to formally prove the efficacy of methods, drugs and supplements used. All efficacy information is given based on proprietary evidence data presented by the relevant authors of the protocols and individual patients website members.'
        ]);

        \App\Models\FooterLang::create([
            'language' => 'ru',
            "footer_id" => 1,
            'disclaimer' => 'Ни один из вышеуказанных протоколов или добавок не был оценен или одобрен FDA для диагностики или лечения рака. Сайт собирает и представляет информацию о протоколах «как есть» используются и разрабатываются сторонними врачами или научными организациями во всем мире, которые не проходили формальные клинические испытания 1-2-3 стадии, необходимые для формального подтверждения эффективности методы, лекарства и добавки, используемые. Вся информация об эффективности дана на основе данных доказательств, представленных соответствующими авторами протоколов и отдельных пациентов веб-сайта.'
        ]);
    }
}
