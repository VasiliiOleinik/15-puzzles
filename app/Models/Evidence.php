<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $color
 * @property Protocol[] $protocols
 */
class Evidence extends Model
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'evidences';

    /**
     * @var array
     */
    protected $fillable = ['name', 'color'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function protocols()
    {
        return $this->hasMany('App\Models\Protocol\Protocol');
    }
}
