<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PageLang extends Model
{
    protected $table = 'pages_langs';
    protected $guarded = [];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LanguageScope);
    }

    public function scopeSetLocaleRu($query)
    {
        return $query->where('language', 'ru');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'pages_id');
    }
}
