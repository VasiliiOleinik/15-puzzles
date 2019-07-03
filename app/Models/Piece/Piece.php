<?php

namespace App\Models\Piece;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $type_id
 * @property string $name
 * @property string $content
 * @property string $img
 * @property Type $type
 * @property PieceDisease[] $pieceDiseases
 * @property PieceMarker[] $pieceMarkers
 * @property PieceProtocol[] $pieceProtocols
 * @property PieceRemedy[] $pieceRemedies
 * @property PieceDisease[] $diseases
 * @property PieceProtocol[] $protocols
 * @property PieceRemedy[] $remedies
 * @property PieceMarker[] $markers
 */
class Piece extends Model
{
	public $timestamps = false;
	
    /**
     * @var array
     */
    protected $fillable = ['type_id', 'name', 'content', 'img'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pieceDiseases()
    {
        return $this->hasMany('App\Models\Piece\PieceDisease');
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
    public function pieceProtocols()
    {
        return $this->hasMany('App\Models\Piece\PieceProtocol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pieceRemedies()
    {
        return $this->hasMany('App\Models\Piece\PieceRemedy');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function diseases()
    {
        return $this->belongsToMany('App\Models\Disease\Disease', 'piece_diseases');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function protocols()
    {
        return $this->belongsToMany('App\Models\Protocol\Protocol', 'piece_protocols');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function remedies()
    {
    return $this->belongsToMany('App\Models\Remedy', 'piece_remedies');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function markers()
    {
    return $this->belongsToMany('App\Models\Marker\Marker', 'piece_markers');
    }
}
