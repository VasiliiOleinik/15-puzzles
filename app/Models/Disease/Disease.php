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
 * @property PieceDisease[] $pieceDiseases
 */
class Disease extends Model
{
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
    public function pieceDiseases()
    {
        return $this->hasMany('App\Models\Piece\PieceDisease');
    }
}
