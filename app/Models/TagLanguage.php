<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * @property int $id
 * @property int $tag_id
 * @property string $language
 * @property string $name
 * @property Tag $tag
 */
class TagLanguage extends Model
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
    /*protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LanguageScope);
    }*/

    /**
     * @var array
     */
    protected $fillable = ['tag_id', 'language', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }
}
