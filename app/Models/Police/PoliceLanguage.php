<?php

namespace App\Models\Police;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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
