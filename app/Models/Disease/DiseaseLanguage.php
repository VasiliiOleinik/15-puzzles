<?php

namespace App\Models\Disease;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * App\Models\Disease\DiseaseLanguage
 *
 * @property int $id
 * @property int $disease_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property Disease $disease
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseLanguage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseLanguage whereDiseaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Disease\DiseaseLanguage whereName($value)
 * @mixin \Eloquent
 */
class DiseaseLanguage extends Model
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
    protected $fillable = ['disease_id', 'language', 'name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function disease()
    {
        return $this->belongsTo('App\Models\Disease\Disease');
    }
}
