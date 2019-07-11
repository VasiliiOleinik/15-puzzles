<?php

namespace App\Models\Disease;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $img
 * @property DiseaseMarker[] $diseaseMarkers
 * @property DiseaseProtocol[] $diseaseProtocols
 * @property DiseaseRemedy[] $diseaseRemedies
 * @property FactorDisease[] $factorDiseases
 */
class Disease extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'content', 'img'];

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
}
