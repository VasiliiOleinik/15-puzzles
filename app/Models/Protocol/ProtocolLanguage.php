<?php

namespace App\Models\Protocol;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\LanguageScope;

/**
 * App\Models\Protocol\ProtocolLanguage
 *
 * @property int $id
 * @property int $protocol_id
 * @property int $evidence_id
 * @property string $language
 * @property string $name
 * @property string $content
 * @property string $subtitle
 * @property Evidence $evidence
 * @property Protocol $protocol
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\ProtocolLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\ProtocolLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\ProtocolLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\ProtocolLanguage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\ProtocolLanguage whereEvidenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\ProtocolLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\ProtocolLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\ProtocolLanguage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\ProtocolLanguage whereProtocolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Protocol\ProtocolLanguage whereSubtitle($value)
 * @mixin \Eloquent
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
    protected $guarded = [];

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
