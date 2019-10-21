<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * App\Models\MethodLanguage
 *
 * @property int $id
 * @property int $method_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property Method $method
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MethodLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MethodLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MethodLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MethodLanguage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MethodLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MethodLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MethodLanguage whereMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MethodLanguage whereName($value)
 * @mixin \Eloquent
 */
class MethodLanguage extends Model
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
    protected $fillable = ['method_id', 'language', 'name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function method()
    {
        return $this->belongsTo('App\Models\Method');
    }
}
