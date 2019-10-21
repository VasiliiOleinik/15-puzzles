<?php

namespace App\Models\Marker;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * App\Models\Marker\MarkerLanguage
 *
 * @property int $id
 * @property int $marker_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property Marker $marker
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MethodLanguage[] $methods
 * @property-read int|null $methods_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerLanguage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerLanguage whereMarkerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Marker\MarkerLanguage whereName($value)
 * @mixin \Eloquent
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
