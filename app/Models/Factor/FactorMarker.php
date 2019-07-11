<?php

namespace App\Models\Factor;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $factor_id
 * @property int $marker_id
 * @property Marker $marker
 * @property Factor $factor
 */
class FactorMarker extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['factor_id', 'marker_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marker()
    {
        return $this->belongsTo('App\Models\Marker');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function factor()
    {
        return $this->belongsTo('App\Models\Factor\Factor');
    }
}
