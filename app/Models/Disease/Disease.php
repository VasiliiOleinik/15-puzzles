<?php

namespace App\Models\Disease;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Disease\Disease
 *
 * @property int $id
 * @property DiseaseMarker[] $diseaseMarkers
 * @property DiseaseProtocol[] $diseaseProtocols
 * @property DiseaseRemedy[] $diseaseRemedies
 * @property FactorDisease[] $factorDiseases
 *  @mixin \Eloquent
 * @property int $is_active
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Disease\DiseaseLanguage $diseaseEng
 * @property-read \App\Models\Disease\DiseaseLanguage $diseaseLang
 * @property-read int|null $disease_markers_count
 * @property-read int|null $disease_protocols_count
 * @property-read int|null $disease_remedies_count
 * @property-read \App\Models\Disease\DiseaseLanguage $diseaseRu
 * @property-read int|null $factor_diseases_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Factor\Factor[] $factors
 * @property-read int|null $factors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Marker\Marker[] $markers
 * @property-read int|null $markers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Protocol\Protocol[] $protocols
 * @property-read int|null $protocols_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Remedy[] $remedies
 * @property-read int|null $remedies_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\Disease newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\Disease newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\Disease query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\Disease whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\Disease whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\Disease whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\Disease whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Disease extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diseaseMarkers()
    {
        return $this->hasMany('App\Models\Disease\DiseaseMarker');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diseaseProtocols()
    {
        return $this->hasMany('App\Models\Disease\DiseaseProtocol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diseaseRemedies()
    {
        return $this->hasMany('App\Models\Disease\DiseaseRemedy');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factorDiseases()
    {
        return $this->hasMany('App\Models\Factor\FactorDisease');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function factors()
    {
        return $this->belongsToMany('App\Models\Factor\Factor', 'factor_diseases');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function protocols()
    {
        return $this->belongsToMany('App\Models\Protocol\Protocol', 'disease_protocols');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function remedies()
    {
        return $this->belongsToMany('App\Models\Remedy', 'disease_remedies');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function markers()
    {
        return $this->belongsToMany('App\Models\Marker\Marker', 'disease_markers');
    }

    public function diseaseRu()
    {
        return $this->hasOne(DiseaseLanguage::class)
            ->where('language', 'ru');
    }

    public function diseaseEng()
    {
        return $this->hasOne(DiseaseLanguage::class)
            ->where('language', 'eng');
    }

    public function diseaseLang()
    {
        return $this->hasOne(DiseaseLanguage::class);
    }
}
