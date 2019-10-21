<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function pageRu()
    {
        return $this->hasOne(PageLang::class, 'pages_id')
            ->where('language', 'ru');
    }

    public function pageEng()
    {
        return $this->hasOne(PageLang::class, 'pages_id')

            ->where('language', 'eng');
    }

    public function pageLang()
    {
        return $this->hasOne(PageLang::class, 'pages_id');
    }

    public function scopeSetLocaleRu($query)
    {
        return $query->where('language', 'ru');
    }
}
