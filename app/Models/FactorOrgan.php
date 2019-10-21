<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FactorOrgan
 *
 * @property int $id
 * @property int $factor_id
 * @property int $organ_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FactorOrgan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FactorOrgan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FactorOrgan query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FactorOrgan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FactorOrgan whereFactorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FactorOrgan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FactorOrgan whereOrganId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FactorOrgan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FactorOrgan extends Model
{
    protected $guarded = [];
}
