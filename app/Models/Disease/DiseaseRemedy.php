<?php

namespace App\Models\Disease;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Disease\DiseaseRemedy
 *
 * @property int $id
 * @property int $disease_id
 * @property int $remedy_id
 * @property Disease $disease
 * @property Remedy $remedy
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseRemedy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseRemedy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseRemedy query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseRemedy whereDiseaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseRemedy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseRemedy whereRemedyId($value)
 * @mixin \Eloquent
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
