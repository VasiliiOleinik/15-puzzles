<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TypesLanguage
 *
 * @property int $id
 * @property int $type_id
 * @property string $language
 * @property string $name
 * @property string $abnormal_condition
 * @property string $normal_condition
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TypesLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TypesLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TypesLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TypesLanguage whereAbnormalCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TypesLanguage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TypesLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TypesLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TypesLanguage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TypesLanguage whereNormalCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TypesLanguage whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TypesLanguage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TypesLanguage extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LanguageScope);
    }

    protected $guarded = [];
}
