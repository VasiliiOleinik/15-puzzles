<?php

namespace App\Models\Factor;

use App\Models\Organ;
use App\Models\TypesLanguage;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Factor\FactorDiagram
 *
 * @property int $id
 * @property string|null $img
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Factor\FactorLanguage $factorEng
 * @property-read \App\Models\Factor\FactorLanguage $factorLanguage
 * @property-read \App\Models\Factor\FactorLanguage $factorRu
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Marker\Marker[] $markers
 * @property-read int|null $markers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Organ[] $organ
 * @property-read int|null $organ_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Protocol\Protocol[] $protocols
 * @property-read int|null $protocols_count
 * @property-read \App\Models\TypesLanguage $typeEng
 * @property-read \App\Models\TypesLanguage $typeRu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDiagram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDiagram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDiagram query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDiagram whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDiagram whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDiagram whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDiagram whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDiagram whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FactorDiagram extends Model
{
    protected $table = 'factors';

    public function organ()
    {
        return $this->belongsToMany(Organ::class, 'factor_organs', 'factor_id', 'organ_id');
    }

    public function factorLanguage()
    {
        return $this->hasOne('App\Models\Factor\FactorLanguage', 'factor_id');
    }

    public function factorRu()
    {
        return $this->hasOne(FactorLanguage::class, 'factor_id')
            ->where('language', 'ru');
    }

    public function factorEng()
    {
        return $this->hasOne(FactorLanguage::class, 'factor_id')
            ->where('language', 'eng');
    }

    public function protocols()
    {
        return $this->belongsToMany('App\Models\Protocol\Protocol', 'factor_protocols', 'factor_id');
    }

    public function markers()
    {
        return $this->belongsToMany('App\Models\Marker\Marker', 'factor_markers', 'factor_id');
    }

    public function typeRu()
    {
        return $this->hasOne(TypesLanguage::class, 'type_id', 'type_id')
            ->where('language', 'ru');
    }

    public function typeEng()
    {
        return $this->hasOne(TypesLanguage::class, 'type_id', 'type_id')
            ->where('language', 'eng');
    }
}
