<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use Illuminate\Database\Eloquent\Model;

class GroupLanguage extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new LanguageScope);
    }
}
