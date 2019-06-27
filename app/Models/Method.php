<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $content
 * @property MarkerMethod[] $markerMethods
 */
class Method extends Model
{
    public $timestamps = false;
    
    /**
     * @var array
     */
    protected $fillable = ['name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function markerMethods()
    {
        return $this->hasMany('App\Models\Marker\MarkerMethod');
    }
}
