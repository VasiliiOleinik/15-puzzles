<?php

namespace App\Models\Factor;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Factor\FactorDisease
 *
 * @property int $id
 * @property int $factor_id
 * @property int $disease_id
 * @property Disease $disease
 * @property Factor $factor
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDisease newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDisease newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDisease query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDisease whereDiseaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDisease whereFactorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDisease whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorDisease whereIsActive($value)
 * @mixin \Eloquent
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
