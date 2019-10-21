<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Type
 *
 * @property int $id
 * @property string $abnormal_condition
 * @property string $normal_condition
 * @property Factor[] $factors
 * @property string $img
 * @property-read int|null $factors_count
 * @property-read \App\Models\TypesLanguage $typeEng
 * @property-read \App\Models\TypesLanguage $typeRu
 * @property-read \App\Models\TypesLanguage $typesLang
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Type whereImg($value)
 * @mixin \Eloquent
 */
class Type extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function factors()
    {
        return $this->belongsToMany('App\Models\Factor\Factor', 'factor_types');
    }

    public function typesLang()
    {
        return $this->hasOne(TypesLanguage::class);
    }

    public function typeRu()
    {
        return $this->hasOne(TypesLanguage::class)
            ->where('language', 'ru');
    }

    public function typeEng()
    {
        return $this->hasOne(TypesLanguage::class)
            ->where('language', 'eng');
    }
}
