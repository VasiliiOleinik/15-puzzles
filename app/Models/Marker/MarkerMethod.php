<?php

namespace App\Models\Marker;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Marker\MarkerMethod
 *
 * @property int $id
 * @property int $marker_id
 * @property int $method_id
 * @property Marker $marker
 * @property Method $method
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerMethod whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerMethod whereMarkerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerMethod whereMethodId($value)
 * @mixin \Eloquent
 */
class MarkerMethod extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['marker_id', 'method_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marker()
    {
        return $this->belongsTo('App\Models\Marker\Marker');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function method()
    {
        return $this->belongsTo('App\Models\Method');
    }
}
