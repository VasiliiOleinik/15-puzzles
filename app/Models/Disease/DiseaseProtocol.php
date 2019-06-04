<?php

namespace App\Models\Disease;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $disease_id
 * @property int $protocol_id
 * @property Disease $disease
 * @property Protocol $protocol
 */
class DiseaseProtocol extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['disease_id', 'protocol_id'];

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
    public function protocol()
    {
        return $this->belongsTo('App\Models\Protocol');
    }
}
