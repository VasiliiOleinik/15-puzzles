<?php

namespace App\Models\Laboratory;

use App\Models\Marker\Marker;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $lat
 * @property string $lng
 * @property LaboratoryMethod[] $laboratoryMethods
 */
class Laboratory extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'lat', 'lng'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function laboratoryMethods()
    {
        return $this->hasMany('App\Models\Laboratory\LaboratoryMethod');
    }

   /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function methods()
    {
        return $this->belongsToMany('App\Models\Method', 'laboratory_methods');
    }

    public function markers()
    {
        return $this->belongsToMany(Marker::class, 'laboratory_markers', 'laboratory_id', 'marker_id');
    }
}
