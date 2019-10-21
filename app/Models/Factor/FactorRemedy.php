<?php

namespace App\Models\Factor;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Factor\FactorRemedy
 *
 * @property int $id
 * @property int $factor_id
 * @property int $remedy_id
 * @property Factor $factor
 * @property Remedy $remedy
 * @property int $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorRemedy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorRemedy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorRemedy query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorRemedy whereFactorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorRemedy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorRemedy whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Factor\FactorRemedy whereRemedyId($value)
 * @mixin \Eloquent
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
