<?php

namespace App\Models\Disease;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $disease_id
 * @property int $marker_id
 * @property Disease $disease
 * @property Marker $marker
 */
class DiseaseMarker extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['disease_id', 'marker_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function disease()
    {
        return $this->belongsTo('App\Models\Disease\Disease');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marker()
    {
        return $this->belongsTo('App\Models\Marker');
    }
}
