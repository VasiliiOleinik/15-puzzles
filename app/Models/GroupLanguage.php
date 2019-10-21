<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GroupLanguage
 *
 * @property int $id
 * @property string $language
 * @property int $group_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GroupLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GroupLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GroupLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GroupLanguage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GroupLanguage whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GroupLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GroupLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GroupLanguage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\GroupLanguage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GroupLanguage extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LanguageScope);
    }
}
