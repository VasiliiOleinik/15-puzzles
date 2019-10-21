<?php

namespace App\Models\Laboratory;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Laboratory\LaboratoryMethod
 *
 * @property int $id
 * @property int $laboratory_id
 * @property int $method_id
 * @property Laboratory $laboratory
 * @property Method $method
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\LaboratoryMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\LaboratoryMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\LaboratoryMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\LaboratoryMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\LaboratoryMethod whereLaboratoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Laboratory\LaboratoryMethod whereMethodId($value)
 * @mixin \Eloquent
 */
class LaboratoryMethod extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['laboratory_id', 'method_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function laboratory()
    {
        return $this->belongsTo('App\Models\Laboratory\Laboratory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function method()
    {
        return $this->belongsTo('App\Models\Method');
    }
}
