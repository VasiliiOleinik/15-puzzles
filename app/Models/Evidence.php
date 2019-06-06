<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Protocol[] $protocols
 */
class Evidence extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'evidences';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function protocols()
    {
        return $this->hasMany('App\Models\Protocol');
    }
}
