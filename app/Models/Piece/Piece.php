<?php

namespace App\Models\Piece;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $content
 * @property Category[] $categories
 * @property PieceMarker[] $pieceMarkers
 * @property PieceProtocol[] $pieceProtocols
 * @property PieceRemedy[] $pieceRemedies
 */
class Piece extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany('App\Models\Category');
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
}
