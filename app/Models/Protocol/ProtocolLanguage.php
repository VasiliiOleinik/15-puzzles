<?php

namespace App\Models\Protocol;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * @property int $id
 * @property int $protocol_id
 * @property int $evidence_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property string $subtitle
 * @property Evidence $evidence
 * @property Protocol $protocol
 */
class ProtocolLanguage extends Model
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
    protected $fillable = ['protocol_id', 'evidence_id', 'language', 'name', 'content', 'subtitle'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evidence()
    {
        return $this->belongsTo('App\Models\Evidence');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function protocol()
    {
        return $this->belongsTo('App\Models\Protocol\Protocol');
    }
}
