<?php


namespace App\Repository;


use App\Models\Page;

class AboutRepository
{
    public function getDataPage($namePage)
    {
        return Page::where('name_page', '=', $namePage)
            ->first()
            ->page(app()->getLocale())
            ->first();
    }

}
