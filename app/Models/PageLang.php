<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageLang extends Model
{
    protected $table = 'pages_langs';
    protected $guarded = [];

    public function scopeSetLocaleRu($query)
    {
        return $query->where('lang', 'ru');
    }
}
