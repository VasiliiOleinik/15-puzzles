<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $piece_id
 * @property int $marker_id
 * @property Marker $marker
 * @property Piece $piece
 */
class PieceMarker extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['piece_id', 'marker_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marker()
    {
        return $this->belongsTo('App\Marker');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function piece()
    {
        return $this->belongsTo('App\Piece');
    }
}
