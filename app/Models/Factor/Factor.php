<?php

namespace App\Models\Factor;

use App\Models\Organ;
use Illuminate\Database\Eloquent\Model;

/**
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
