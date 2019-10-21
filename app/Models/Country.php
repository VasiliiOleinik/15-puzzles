<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name
 * @property string $lat
 * @property string $lng
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Laboratory\Laboratory[] $labaratories
 * @property-read int|null $labaratories_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Country whereName($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];

    public function labaratories()
    {
        return $this->belongsToMany(Laboratory\Laboratory::class);
    }


}
