<?php

namespace App\Models\Piece;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $piece_id
 * @property int $remedy_id
 * @property Piece $piece
 * @property Remedy $remedy
 */
class PieceRemedy extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['piece_id', 'remedy_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function piece()
    {
        return $this->belongsTo('App\Models\Piece\Piece');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function remedy()
    {
        return $this->belongsTo('App\Models\Remedy');
    }
}
