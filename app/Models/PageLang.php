<?php

namespace App\Models;

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
        static::addGlobalScope('lang', function (Builder $builder) {
            $builder->where('lang', app()->getLocale());
        });
    }

    public function scopeSetLocaleRu($query)
    {
        return $query->where('lang', 'ru');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'pages_id');
    }
}
