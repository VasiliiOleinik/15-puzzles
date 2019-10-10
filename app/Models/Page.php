<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function pageRu()
    {
        return $this->hasOne(PageLang::class, 'pages_id')
            ->where('lang', 'ru');
    }

    public function pageEng()
    {
        return $this->hasOne(PageLang::class, 'pages_id')
            ->where('lang', 'eng');
    }
}
