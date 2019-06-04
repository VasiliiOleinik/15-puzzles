<?php

namespace App\Models\Disease;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $disease_id
 * @property int $remedy_id
 * @property Disease $disease
 * @property Remedy $remedy
 */
class DiseaseRemedy extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['disease_id', 'remedy_id'];

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
    public function remedy()
    {
        return $this->belongsTo('App\Models\Remedy');
    }
}
