<?php

namespace App\Models\Piece;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $piece_id
 * @property int $disease_id
 * @property Disease $disease
 * @property Piece $piece
 */
class PieceDisease extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['piece_id', 'disease_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function disease()
    {
        return $this->belongsTo('App\Models\Disease\Disease');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function piece()
    {
        return $this->belongsTo('App\Models\Piece\Piece');
    }
}
