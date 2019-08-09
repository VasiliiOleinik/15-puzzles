<?php

namespace App\Models\Factor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

/**
 * @property int $id
 * @property int $language_id
 * @property int $factor_id
 * @property int $type_id
 * @property string $name
 * @property string $content
 * @property Factor $factor
 * @property Language $language
 * @property FactorDisease[] $diseases
 * @property FactorProtocol[] $protocols
 * @property FactorRemedy[] $remedies
 * @property FactorMarker[] $markers
 */
class FactorLanguageS extends Model
{
    public $timestamps = false;

    public function scopeSetLocale($query)
    {
        return $query->where('language', app()->getLocale() );
    }

    /**
     * @var array
     */
    protected $fillable = ['language_id', 'factor_id', 'language', 'type_id', 'name', 'content'];

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
    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function diseases()
    {
        return $this->belongsToMany('App\Models\Disease\Disease', 'factor_diseases', 'factor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function protocols()
    {
        return $this->belongsToMany('App\Models\Protocol\Protocol', 'factor_protocols', 'factor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function remedies()
    {
    return $this->belongsToMany('App\Models\Remedy', 'factor_remedies', 'factor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function markers()
    {
    return $this->belongsToMany('App\Models\Marker\Marker', 'factor_markers', 'factor_id');
    }
}
