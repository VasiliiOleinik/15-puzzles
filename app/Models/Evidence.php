<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Evidence
 *
 * @property int $id
 * @property string $name
 * @property string $color
 * @property Protocol[] $protocols
 * @property-read int|null $protocols_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Evidence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Evidence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Evidence query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Evidence whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Evidence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Evidence whereName($value)
 * @mixin \Eloquent
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
