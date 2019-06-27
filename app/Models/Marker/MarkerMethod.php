<?php

namespace App\Models\Marker;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $marker_id
 * @property int $method_id
 * @property Marker $marker
 * @property Method $method
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
