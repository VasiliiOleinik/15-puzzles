<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * App\Models\RemedyLanguage
 *
 * @property int $id
 * @property int $remedy_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property Remedy $remedy
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RemedyLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RemedyLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RemedyLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RemedyLanguage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RemedyLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RemedyLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RemedyLanguage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RemedyLanguage whereRemedyId($value)
 * @mixin \Eloquent
 */
class RemedyLanguage extends Model
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
    protected $fillable = ['remedy_id', 'language', 'name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function remedy()
    {
        return $this->belongsTo('App\Models\Remedy');
    }
}
