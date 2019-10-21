<?php

namespace App\Models\Disease;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Disease\DiseaseProtocol
 *
 * @property int $id
 * @property int $disease_id
 * @property int $protocol_id
 * @property Disease $disease
 * @property Protocol $protocol
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseProtocol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseProtocol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseProtocol query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseProtocol whereDiseaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseProtocol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseProtocol whereProtocolId($value)
 * @mixin \Eloquent
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
        return $this->belongsTo('App\Models\Protocol\Protocol');
    }
}
