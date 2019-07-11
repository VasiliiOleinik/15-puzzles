<?php

namespace App\Models\Factor;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $factor_id
 * @property int $disease_id
 * @property Disease $disease
 * @property Factor $factor
 */
class FactorDisease extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['factor_id', 'disease_id'];

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
    public function factor()
    {
        return $this->belongsTo('App\Models\Factor\Factor');
    }
}
