<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $content
 * @property DiseaseMarker[] $diseaseMarkers
 * @property PieceMarker[] $pieceMarkers
 * @property ProtocolMarker[] $protocolMarkers
 */
class Marker extends Model
{
	public $timestamps = false;
	
    /**
     * @var array
     */
    protected $fillable = ['name', 'content'];

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
}
