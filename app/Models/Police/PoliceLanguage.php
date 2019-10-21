<?php

namespace App\Models\Police;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Police\PoliceLanguage
 *
 * @property int $id
 * @property string|null $language
 * @property string|null $title
 * @property string|null $description
 * @property string|null $h1
 * @property int $police_id
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Police\Police $police
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\PoliceLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\PoliceLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\PoliceLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\PoliceLanguage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\PoliceLanguage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\PoliceLanguage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\PoliceLanguage whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\PoliceLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\PoliceLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\PoliceLanguage wherePoliceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\PoliceLanguage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Police\PoliceLanguage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PoliceLanguage extends Model
{
    protected $table = 'police_langs';

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LanguageScope);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function police()
    {
        return $this->belongsTo(Police::class, 'police_id');
    }
}
