<?php

namespace App\Models\Factor;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $factor_id
 * @property int $remedy_id
 * @property Factor $factor
 * @property Remedy $remedy
 */
class FactorRemedy extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['factor_id', 'remedy_id'];

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
    public function remedy()
    {
        return $this->belongsTo('App\Models\Remedy');
    }
}
