<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property string|null $name_page
 * @property string|null $img
 * @property string|null $video
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PageLang $pageEng
 * @property-read \App\Models\PageLang $pageLang
 * @property-read \App\Models\PageLang $pageRu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page setLocaleRu()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereNamePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereVideo($value)
 * @mixin \Eloquent
 */
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
