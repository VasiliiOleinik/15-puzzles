<?php

namespace App\Models\Laboratory;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $laboratory_id
 * @property int $method_id
 * @property Laboratory $laboratory
 * @property Method $method
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
