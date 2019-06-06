<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $abnormal_condition
 * @property string $normal_condition
 * @property Piece[] $pieces
 */
class Category extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'abnormal_condition', 'normal_condition'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pieces()
    {
        return $this->hasMany('App\Models\Piece\Piece');
    }
}
