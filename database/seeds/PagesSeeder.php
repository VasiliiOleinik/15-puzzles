<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages =[
            [
                [
                    'lang' => 'eng',
                'title' => 'About',
                'description' =>
                    '
                    Theory behind this project is that there are total of 15 "pieces" (systemic factors) of the cancer "puzzle" that are parts of different conventional medical science cancer treatment protocols and ones known in naturopathic or holistic medicine.
                    We take the position of looking at cancer not as a tumor that has to be removed, but rather as a consequence of number of individual systemic imbalances in different organs leading to formation of a malignant tumor. (see \'holistic approach to cancer\').
                    The international team of doctors, researchers and medical students who keep their names and accreditations private, are working on this web site, trying to systematize existing knowledge and medical expertise to understand, how exactly one\'s body gets \'confused\' in the process of developing the cancer and look at different diagnostic and treatment approaches related to every of these 15 systemic factors.
                    We are gladly accepting scientific input from web site audience who can contribute their expertise to understanding cancer pathogenesis or approaches to treating its influential factors, or treatment results.
                    Mind that the information is given for research purposes only, evaluating this theory or drawing the conclusions about its practical implementation is ones own responsibility. This is not a replacement of a conventional oncology treatment or a visit to a skilled naturopathic doctor.
                    ',
                'name_page' => 'about',
                'short_description'=>null,
                'img' => 'img/about_bg.jpg',
                'puzzles_description' => '
                    The 15 pieces of the cancer process may look confusing at a first glance. But keep in mind that there are evidences of the riddle in 1-2 moves only. It might be necessary to move as much as 4 or 6 pieces to fix your body, feel free to explore the puzzle and sort it out!
                ',
                'h1'=>null,
                    ],
                [
                    'lang' => 'ru',
                    'title' => 'О нас',
                    'description' => '
                    Теория, лежащая в основе этого проекта, состоит в том, что всего 15 «кусочков» (системных факторов) рака «пазлов», которые являются частью различных традиционных протоколов лечения рака медицинской науки и известные в натуропатической или холистической медицине.
                    Мы занимаем позицию, рассматривая рак не как опухоль, которая должна быть удалена, а скорее как                       следствием ряда индивидуальных системных дисбалансов в разных органах, приводящих к образованию злокачественная опухоль. (см. «целостный подход к раку»). 
                    Международная команда врачей, исследователи и студенты-медики, которые держат свои имена и аккредитации в тайне, работают над этот веб-сайт, пытаясь систематизировать существующие знания и медицинский опыт, чтобы понять, как                       в процессе развития рака человек «запутывается» и смотрит на разные диагностические и лечебные подходы, связанные с каждым из этих 15 системных факторов. 
                    Мы являемся с удовольствием принимаю научный вклад от аудитории веб-сайта, которая может внести свой вклад в понимание патогенеза рака или подходов к лечению его влиятельных факторов или лечения результаты.
                    Помните, что информация предоставляется только для исследовательских целей, оценивая эта теория или делать выводы о ее практической реализации является собственным обязанность. Это не замена традиционного лечения онкологии или посещение опытный врач-натуропат.
                ',
                    'name_page' => 'about',
                    'short_description'=>null,
                    'img' => 'img/about_bg.jpg',
                    'puzzles_description' => 'На первый взгляд 15 частей ракового процесса могут показаться странными. Но имейте в виду, что свидетельства загадки есть только в 1-2 ходах. Может потребоваться переместить целых 4 или 6 частей, чтобы исправить свое тело, не стесняйтесь исследовать головоломку и разобраться с ней!',
                    'h1'=>null,
                ]
            ],
            [
                [
                    'lang' => 'ru',
                    'title' => '15 пазлов факторная диаграмма',
                    'description'=>null,
                    'name_page' => 'factor_diagram',
                    'short_description' => 'факторная диаграмма описание',
                    'h1'=>null,
                ],
                [
                    'lang' => 'eng',
                    'title' => '15 puzzles factor diagram',
                    'description'=>null,
                    'name_page' => 'factor_diagram',
                    'img' => null,
                    'short_description' => 'factor diagram description',
                    'puzzles_description'=>null,
                    'h1'=>null,
                ]

            ],
            [
                [
                    'lang' => 'ru',
                    'title' => 'Faq описание',
                    'description'=>null,
                    'name_page' => 'FAQ',
                    'img' => null,
                    'short_description' => null,
                    'puzzles_description'=>null,
                    'h1'=>null,
                ],
                [
                    'lang' => 'eng',
                    'title' => 'Faq description',
                    'description'=>null,
                    'name_page' => 'FAQ',
                    'img' => null,
                    'short_description' => null,
                    'puzzles_description'=>null,
                    'h1'=>null,
                ],


            ],
            [
                [
                    'lang' => 'eng',
                    'title' => 'Literature',
                    'description'=>null,
                    'name_page' => 'literature',
                    'img' => null,
                    'short_description' => 'Literature description',
                    'puzzles_description'=>null,
                    'h1'=>null,
                ],
                [
                    'lang' => 'ru',
                    'title' => 'Литература',
                    'description'=>null,
                    'name_page' => 'literature',
                    'img' => null,
                    'short_description' => 'Литература описание',
                    'puzzles_description'=>null,
                ]

            ],
            [
                [
                    'lang' => 'ru',
                    'title' => '15 puzzles - Главная',
                    'description' => 'Есть 15 известных «пазлов» головоломки рака, которые участвуют в известных протоколах лечения естественного рака.
                    Этот веб-сайт является вашей исследовательской базой, чтобы узнать, как именно ваше тело «запуталось» в процессе развития рака, и попытаться разработать собственный план обращения процесса канцерогенеза, основанный на лучших известных методах лечения натуропатического рака. Этот веб-сайт является вашей исследовательской базой, чтобы узнать, как именно ваше тело «запуталось» в процессе развития рака, и попытаться разработать собственный план обращения процесса канцерогенеза, основанный на лучших известных методах лечения натуропатического рака.',
                    'name_page' => 'main',
                    'img' => null,
                    'short_description' => 'Главная описание',
                    'puzzles_description' => 'На первый взгляд 15 частей ракового процесса могут показаться странными. Но имейте в виду, что свидетельства загадки есть только в 1-2 ходах. Может потребоваться переместить целых 4 или 6 частей, чтобы исправить свое тело, не стесняйтесь исследовать головоломку и разобраться с ней!',
                    'h1' => 'Протоколы лечения рака  целостной медицины',
                ],
                [
                    'lang' => 'eng',
                    'title' => '15 puzzles - Main',
                    'description' => 'There are 15 known "pieces" of the cancer puzzle that are involved in known natural cancer treatment protocols.
                    This web site is your research base to find out how exactly your body got "confused" in the process of developing the cancer and try develop your own plan of reversing the cancerogenesis process based on the best known practices in naturopathic cancer treatment.
                    This web site is your research base to find out how exactly your body got "confused" in the process of developing the cancer and try develop your own plan of reversing the cancerogenesis process based on the best known practices in naturopathic cancer treatment.',
                    'name_page' => 'main',
                    'img' => null,
                    'short_description' => 'Main description',
                    'puzzles_description'=>'The 15 pieces of the cancer process may look confusing at a first glance. But keep in mind that there are evidences of the riddle in 1-2 moves only. It might be necessary to move as much as 4 or 6 pieces to fix your body, feel free to explore the puzzle and sort it out!',
                    'h1'=>'Cancer reversal protocols  of holistic medicine'
                ]

               ],
            [
                [
                    'lang' => 'ru',
                    'title' => 'Истории болезни',
                    'description'=>null,
                    'name_page' => 'member_cases',
                    'img' => null,
                    'short_description' => 'истории болезни описание',
                    'puzzles_description'=>null,
                    'h1'=>null,
                ],
                [
                    'lang' => 'eng',
                    'title' => 'Истории болезни',
                    'description'=>null,
                    'name_page' => 'member_cases',
                    'img' => null,
                    'short_description' => 'member cases description',
                    'puzzles_description'=>null,
                    'h1'=>null,
                ]

            ],
            [
                [
                    'lang' => 'ru',
                    'title' => 'Новости',
                    'description'=>null,
                    'name_page' => 'news',
                    'img'=>null,
                    'short_description' => 'Новости описание',
                    'puzzles_description'=>null,
                    'h1'=>null,
                ],
                [
                    'lang' => 'eng',
                    'title' => 'News',
                    'description'=>null,
                    'name_page' => 'news',
                    'img'=>null,
                    'short_description' => 'News description',
                    'puzzles_description'=>null,
                    'h1'=>null,
                ]

            ],
            [
                [
                    'lang' => 'ru',
                    'title' => '15 пазлов Личный кабинет',
                    'description'=>null,
                    'name_page' => 'personal_cabinet',
                    'img'=>null,
                    'short_description' => 'Личный кабинет описание',
                    'puzzles_description'=>null,
                    'h1'=>null,
                ],
                [
                    'lang' => 'eng',
                    'title' => '15 puzzles Personal cabinet',
                    'description'=>null,
                    'name_page' => 'personal_cabinet',
                    'img'=>null,
                    'short_description' => 'Personal cabinet description',
                    'puzzles_description'=>null,
                    'h1'=>null,
                ]


            ]
        ];
        foreach ($pages as $page) {
            $pageItem = \App\Models\Page::create([
                'name_page'=>$page[0]['name_page'],
                'img'=>isset($page[0]['img']) ? $page[0]['img']: null,
                'video'=>null,
            ]);
            foreach ($page as $item){
                \App\PagesLang::create([
                    'pages_id'=>$pageItem->id,
                    'lang'=>$item['lang'],
                    'title'=>isset($item['title']) ? $item['title'] : null ,
                    'short_description'=>isset($item['short_description']) ? $item['short_description'] : null,
                    'puzzles_description'=>isset($item['puzzles_description']) ? $item['puzzles_description'] : null,
                    'h1'=>isset($item['h1']) ? $item['h1'] : null ,
                ]);
            }
        }
    }
}
