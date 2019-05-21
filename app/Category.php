<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $piece_id
 * @property string $abnormal_condition
 * @property string $normal_condition
 * @property Piece $piece
 */
class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['piece_id', 'abnormal_condition', 'normal_condition'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function piece()
    {
        return $this->belongsTo('App\Piece');
    }
}
