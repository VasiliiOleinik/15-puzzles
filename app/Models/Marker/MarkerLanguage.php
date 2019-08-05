<?php

namespace App\Models\Marker;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * @property int $id
 * @property int $marker_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property Marker $marker
 */
class MarkerLanguage extends Model
{
    public $timestamps = false;

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
    protected $fillable = ['marker_id', 'method_id', 'language', 'name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marker()
    {
        return $this->belongsTo('App\Models\Marker\Marker');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function methods()
    {
        return $this->belongsToMany('App\Models\MethodLanguage', 'marker_language_method_languages', 'marker_language_id', 'method_language_id');
    }
}
