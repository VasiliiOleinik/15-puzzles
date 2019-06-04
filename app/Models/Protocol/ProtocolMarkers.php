<?php

namespace App\Models\Protocol;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $protocol_id
 * @property int $marker_id
 * @property Marker $marker
 * @property Protocol $protocol
 */
class ProtocolMarkers extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['protocol_id', 'marker_id'];

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
    public function protocol()
    {
        return $this->belongsTo('App\Models\Protocol\Protocol');
    }
}
