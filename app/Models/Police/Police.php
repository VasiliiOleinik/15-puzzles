<?php

namespace App\Models\Police;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Police\Police
 *
 * @property int $id
 * @property string|null $alias
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Police\PoliceLanguage $policeEng
 * @property-read \App\Models\Police\PoliceLanguage $policeLang
 * @property-read \App\Models\Police\PoliceLanguage $policeRu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\Police newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\Police newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\Police query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\Police setLocaleRu()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\Police whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\Police whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\Police whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\Police whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\Police whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Police extends Model
{
    protected $table = 'police';

    public function policeRu()
    {
        return $this->hasOne(PoliceLanguage::class, 'police_id')
            ->where('language', 'ru');
    }

    public function policeEng()
    {
        return $this->hasOne(PoliceLanguage::class, 'police_id')
            ->where('language', 'eng');
    }

    public function policeLang()
    {
        return $this->hasOne(PoliceLanguage::class, 'police_id');
    }

    public function scopeSetLocaleRu($query)
    {
        return $query->where('language', 'ru');
    }
}
