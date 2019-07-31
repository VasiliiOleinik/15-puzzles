<?php

namespace App\Models\Factor;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * @property int $id
 * @property int $language_id
 * @property int $factor_id
 * @property int $type_id
 * @property string $name
 * @property string $content
 * @property Factor $factor
 * @property Language $language
 */
class FactorLanguage extends Model
{
    public $timestamps = false;

    public function scopeSetLocale($query)
    {
        return $query->where('language', app()->getLocale() );
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LanguageScope);
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
}
