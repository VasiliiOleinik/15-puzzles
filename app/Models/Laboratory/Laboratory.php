<?php

namespace App\Models\Laboratory;

use App\Models\Marker\Marker;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Laboratory\Laboratory
 *
 * @property int $id
 * @property string $name
 * @property string $lat
 * @property string $lng
 * @property LaboratoryMethod[] $laboratoryMethods
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $link
 * @property-read int|null $laboratory_methods_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Marker\Marker[] $markers
 * @property-read int|null $markers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Method[] $methods
 * @property-read int|null $methods_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\Laboratory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\Laboratory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\Laboratory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\Laboratory whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\Laboratory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\Laboratory whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\Laboratory whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\Laboratory whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\Laboratory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\Laboratory wherePhone($value)
 * @mixin \Eloquent
 */
class Laboratory extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded =  [];

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
