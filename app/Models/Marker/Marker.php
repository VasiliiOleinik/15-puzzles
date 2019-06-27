<?php

namespace App\Models\Marker;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $subtitle
 * @property DiseaseMarker[] $diseaseMarkers
 * @property MarkerMethod[] $markerMethods
 * @property PieceMarker[] $pieceMarkers
 * @property ProtocolMarker[] $protocolMarkers
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
    public function pieceMarkers()
    {
        return $this->hasMany('App\Models\Piece\PieceMarker');
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
    public function pieces()
    {
    return $this->belongsToMany('App\Models\Piece\Piece', 'piece_markers');
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
}
