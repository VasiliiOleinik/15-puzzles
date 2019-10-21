<?php

namespace App\Models\Protocol;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Protocol\Protocol
 *
 * @property int $id
 * @property int $evidence_id
 * @property Evidence $evidence
 * @property DiseaseProtocol[] $diseaseProtocols
 * @property FactorProtocol[] $factorProtocols
 * @property ProtocolMarker[] $protocolMarkers
 * @property ProtocolRemedy[] $protocolRemedies
 *  * @mixin \Eloquent
 * @property string|null $url
 * @property int $is_active
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read int|null $disease_protocols_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Disease\Disease[] $diseases
 * @property-read int|null $diseases_count
 * @property-read int|null $factor_protocols_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Factor\Factor[] $factors
 * @property-read int|null $factors_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Marker\Marker[] $markers
 * @property-read int|null $markers_count
 * @property-read \App\Models\Protocol\ProtocolLanguage $protocolEng
 * @property-read \App\Models\Protocol\ProtocolLanguage $protocolLanguages
 * @property-read int|null $protocol_markers_count
 * @property-read int|null $protocol_remedies_count
 * @property-read \App\Models\Protocol\ProtocolLanguage $protocolRu
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Remedy[] $remedies
 * @property-read int|null $remedies_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\Protocol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\Protocol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\Protocol query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\Protocol whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\Protocol whereEvidenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\Protocol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\Protocol whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\Protocol whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\Protocol whereUrl($value)
 * @mixin \Eloquent
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
