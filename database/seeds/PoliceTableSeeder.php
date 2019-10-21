<?php

use App\Models\Police\Police;
use App\Models\Police\PoliceLanguage;
use Illuminate\Database\Seeder;

class PoliceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                [
                    'lang' => 'ru',
                    'alias' => '111',
                    'title' => 'ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ',
                    'h1' => 'ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ',
                    'description' => 'ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ',
                    'police_id' => 1,
                    'content' => '<p>Контент</p>'
                ],
                [
                    'lang' => 'eng',
                    'alias' => '111',
                    'title' => 'PRIVACY POLICY',
                    'h1' => 'PRIVACY POLICY',
                    'description' => 'PRIVACY POLICY',
                    'police_id' => 1,
                    'content' => '<h1>Privacy Policy</h1>
                        <p>Effective date: August 27, 2019</p>
                        <p>UMER ("us", "we", or "our") operates the 15puzzle.ru website (the "Service").</p>
                        <ul>
                            <li>Email address</li>
                            <li>First name and last name</li>
                            <li>Phone number</li>
                            <li>Address, State, Province, ZIP/Postal code, City</li>
                            <li>Cookies and Usage Data</li>
                        </ul>
                        <h4 class="">Usage Data</h4>
                        <p>We may also collect information how the Service is accessed and used ("Usage Data"). This Usage Data may include information such as your computer\'s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>'
                ],
            ],
            [
                [
                    'lang' => 'ru',
                    'alias' => '222',
                    'title' => 'УСЛОВИЯ ОБСЛУЖИВАНИЯ',
                    'h1' => 'УСЛОВИЯ ОБСЛУЖИВАНИЯ',
                    'description' => 'УСЛОВИЯ ОБСЛУЖИВАНИЯ',
                    'police_id' => 2,
                    'content' => '<p>Контент</p>'
                ],
                [
                    'lang' => 'eng',
                    'alias' => '222',
                    'title' => 'TERMS OF SERVICE',
                    'h1' => 'TERMS OF SERVICE',
                    'description' => 'TERMS OF SERVICE',
                    'police_id' => 2,
                    'content' => '<h1>Privacy Policy</h1>
                        <p>Effective date: August 27, 2019</p>
                        <p>UMER ("us", "we", or "our") operates the 15puzzle.ru website (the "Service").</p>
                        <ul>
                            <li>Email address</li>
                            <li>First name and last name</li>
                            <li>Phone number</li>
                            <li>Address, State, Province, ZIP/Postal code, City</li>
                            <li>Cookies and Usage Data</li>
                        </ul>
                        <h4 class="">Usage Data</h4>
                        <p>We may also collect information how the Service is accessed and used ("Usage Data"). This Usage Data may include information such as your computer\'s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>'
                ],
            ]
        ];


        foreach ($data as $item) {
            $policeItem = Police::create([
                'alias' => $item[0]['alias'],
                'is_active' => 1,
            ]);
            foreach ($item as $value){
                PoliceLanguage::create([
                    'language' => $value['lang'],
                    'title'=> $value['title'],
                    'h1'=> $value['h1'],
                    'description' => $value['description'],
                    'police_id' => $policeItem->id,
                    'content' => $value['content'],
                ]);
            }
        }
    }
}
