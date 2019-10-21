<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\PageLang
 *
 * @property int $id
 * @property string $language
 * @property string $title
 * @property int $pages_id
 * @property string|null $description
 * @property string|null $short_description
 * @property string|null $puzzles_description
 * @property string|null $h1
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Page $page
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang setLocaleRu()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang wherePagesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang wherePuzzlesDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PageLang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
