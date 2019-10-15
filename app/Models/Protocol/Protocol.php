<?php

namespace App\Models\Protocol;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $evidence_id
 * @property Evidence $evidence
 * @property DiseaseProtocol[] $diseaseProtocols
 * @property FactorProtocol[] $factorProtocols
 * @property ProtocolMarker[] $protocolMarkers
 * @property ProtocolRemedy[] $protocolRemedies
 */
class Protocol extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evidence()
    {
        return $this->belongsTo('App\Models\Evidence');
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
    public function factorProtocols()
    {
        return $this->hasMany('App\Models\Factor\FactorProtocol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function protocolMarkers()
    {
        return $this->hasMany('App\Models\Protocol\ProtocolMarker');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function protocolRemedies()
    {
        return $this->hasMany('App\Models\Protocol\ProtocolRemedy');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function factors()
    {
        return $this->belongsToMany('App\Models\Factor\Factor', 'factor_protocols');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function diseases()
    {
        return $this->belongsToMany('App\Models\Disease\Disease', 'disease_protocols');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function remedies()
    {
        return $this->belongsToMany('App\Models\Remedy', 'protocol_remedies');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function markers()
    {
        return $this->belongsToMany('App\Models\Marker\Marker', 'protocol_markers');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function protocolLanguages()
    {
        return $this->hasOne('App\Models\Protocol\ProtocolLanguage');
    }

    public function protocolRu()
    {
        return $this->hasOne(ProtocolLanguage::class)
            ->where('language', 'ru');
    }

    public function protocolEng()
    {
        return $this->hasOne(ProtocolLanguage::class)
            ->where('language', 'eng');
    }
}
