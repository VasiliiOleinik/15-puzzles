<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $guarded = [];

    public function footerRu()
    {
        return $this->hasOne(FooterLang::class)
            ->where('language', 'ru');
    }

    public function footerEng()
    {
        return $this->hasOne(FooterLang::class)
            ->where('language', 'eng');
    }

    public function footerLang()
    {
        return $this->hasOne(FooterLang::class);
    }

}
