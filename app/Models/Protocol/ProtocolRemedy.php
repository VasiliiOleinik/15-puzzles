<?php

namespace App\Models\Protocol;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $protocol_id
 * @property int $remedy_id
 * @property Protocol $protocol
 * @property Remedy $remedy
 */
class ProtocolRemedy extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['protocol_id', 'remedy_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function protocol()
    {
        return $this->belongsTo('App\Models\Protocol\Protocol');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function remedy()
    {
        return $this->belongsTo('App\Models\Protocol\Remedy');
    }
}
