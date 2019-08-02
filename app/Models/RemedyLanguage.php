<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * @property int $id
 * @property int $remedy_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property Remedy $remedy
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
