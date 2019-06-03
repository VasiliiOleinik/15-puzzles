<?php

namespace App\Models\Piece;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $piece_id
 * @property int $protocol_id
 * @property Piece $piece
 * @property Protocol $protocol
 */
class PieceProtocol extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['piece_id', 'protocol_id'];

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
    public function protocol()
    {
        return $this->belongsTo('App\Models\Protocol');
    }
}
