<?php

namespace App\Models\Factor;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $factor_id
 * @property int $protocol_id
 * @property Factor $factor
 * @property Protocol $protocol
 */
class FactorProtocol extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['factor_id', 'protocol_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function factor()
    {
        return $this->belongsTo('App\Models\Factor\Factor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function protocol()
    {
        return $this->belongsTo('App\Models\Protocol');
    }
}
