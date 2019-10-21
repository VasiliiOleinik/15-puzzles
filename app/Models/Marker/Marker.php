<?php

namespace App\Models\Marker;

use App\Models\MethodLanguage;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Marker\Marker
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $subtitle
 * @property DiseaseMarker[] $diseaseMarkers
 * @property MarkerMethod[] $markerMethods
 * @property FactorMarker[] $factorMarkers
 * @property ProtocolMarker[] $protocolMarkers
 * @property int $is_active
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read int|null $disease_markers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Disease\Disease[] $diseases
 * @property-read int|null $diseases_count
 * @property-read int|null $factor_markers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Factor\Factor[] $factors
 * @property-read int|null $factors_count
 * @property-read \App\Models\Marker\MarkerLanguage $markerEng
 * @property-read \App\Models\Marker\MarkerLanguage $markerLanguage
 * @property-read int|null $marker_methods_count
 * @property-read \App\Models\Marker\MarkerLanguage $markerRu
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Method[] $methods
 * @property-read int|null $methods_count
 * @property-read int|null $protocol_markers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Protocol\Protocol[] $protocols
 * @property-read int|null $protocols_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\Marker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\Marker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\Marker query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\Marker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\Marker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\Marker whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\Marker whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Marker extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'content', 'subtitle'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diseaseMarkers()
    {
        return $this->hasMany('App\Models\DIsease\DiseaseMarker');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function markerMethods()
    {
        return $this->hasMany('App\Models\Marker\MarkerMethod');
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
    public function protocolMarkers()
    {
        return $this->hasMany('App\Models\Protocol\ProtocolMarker');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function factors()
    {
        return $this->belongsToMany('App\Models\Factor\Factor', 'factor_markers');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function diseases()
    {
        return $this->belongsToMany('App\Models\Disease\Disease', 'disease_markers');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function protocols()
    {
        return $this->belongsToMany('App\Models\Protocol\Protocol', 'protocol_markers');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function methods()
    {
        return $this->belongsToMany('App\Models\Method', 'marker_methods');
    }

    public function markerLanguage()
    {
        return $this->hasOne(MarkerLanguage::class);
    }

    public function markerRu()
    {
        return $this->hasOne(MarkerLanguage::class)
            ->where('language', 'ru');
    }

    public function markerEng()
    {
        return $this->hasOne(MarkerLanguage::class)
            ->where('language', 'eng');
    }
}
