<?php

namespace App\Models\Piece;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property string $img
 * @property Category $category
 * @property PieceDisease[] $pieceDiseases
 * @property PieceMarker[] $pieceMarkers
 * @property PieceProtocol[] $pieceProtocols
 * @property PieceRemedy[] $pieceRemedies
 */
class Piece extends Model
{
	public $timestamps = false;
	
    /**
     * @var array
     */
    protected $fillable = ['category_id', 'name', 'content', 'img'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
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
}
