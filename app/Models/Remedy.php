<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $content
 * @property PieceRemedy[] $pieceRemedies
 */
class Remedy extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pieceRemedies()
    {
        return $this->hasMany('App\Models\Piece\PieceRemedy');
    }
}
