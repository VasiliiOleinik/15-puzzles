<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $lat
 * @property string $lng
 */
class Country extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];

    public function labaratories()
    {
        return $this->belongsToMany(Laboratory\Laboratory::class);
    }


}
