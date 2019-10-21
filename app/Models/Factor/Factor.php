<?php

namespace App\Models\Factor;

use App\Models\Organ;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Factor\Factor
 *
 * @property int $id
 * @property int $type_id
 * @property string $img
 * @property Type $type
 * @property FactorDisease[] $factorDiseases
 * @property FactorMarker[] $factorMarkers
 * @property FactorProtocol[] $factorProtocols
 * @property FactorRemedy[] $factorRemedies
 * @property FactorDisease[] $diseases
 * @property FactorProtocol[] $protocols
 * @property FactorRemedy[] $remedies
 * @property FactorMarker[] $markers
 * @mixin \Eloquent
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $diseases_count
 * @property-read int|null $factor_diseases_count
 * @property-read \App\Models\Factor\FactorLanguage $factorEng
 * @property-read \App\Models\Factor\FactorLanguage $factorLanguage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Factor\FactorLanguage[] $factorLanguages
 * @property-read int|null $factor_languages_count
 * @property-read int|null $factor_markers_count
 * @property-read int|null $factor_protocols_count
 * @property-read int|null $factor_remedies_count
 * @property-read \App\Models\Factor\FactorLanguage $factorRu
 * @property-read int|null $markers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Organ[] $organ
 * @property-read int|null $organ_count
 * @property-read int|null $protocols_count
 * @property-read int|null $remedies_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\Factor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\Factor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\Factor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\Factor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\Factor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\Factor whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\Factor whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\Factor whereUpdatedAt($value)
 */
class Factor extends Model
{
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = ['type_id', 'img'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\Models\Group');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factorDiseases()
    {
        return $this->hasMany('App\Models\Factor\FactorDisease');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factorMarkers()
    {
        return $this->hasMany('App\Models\Factor\FactorMarker');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factorProtocols()
    {
        return $this->hasMany('App\Models\Factor\FactorProtocol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factorRemedies()
    {
        return $this->hasMany('App\Models\Factor\FactorRemedy');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function diseases()
    {
        return $this->belongsToMany('App\Models\Disease\Disease', 'factor_diseases');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function protocols()
    {
        return $this->belongsToMany('App\Models\Protocol\Protocol', 'factor_protocols');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function remedies()
    {
        return $this->belongsToMany('App\Models\Remedy', 'factor_remedies');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function markers()
    {
        return $this->belongsToMany('App\Models\Marker\Marker', 'factor_markers');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function factorLanguages()
    {
        return $this->hasMany('App\Models\Factor\FactorLanguage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function factorLanguage()
    {
        return $this->hasOne('App\Models\Factor\FactorLanguage');
    }

    public function factorRu()
    {
        return $this->hasOne(FactorLanguage::class)
            ->where('language', 'ru');
    }

    public function factorEng()
    {
        return $this->hasOne(FactorLanguage::class)
            ->where('language', 'eng');
    }

    public function organ()
    {
        return $this->belongsToMany(Organ::class, 'factor_organs');
    }
}
