<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $content
 * @property MarkerMethod[] $markerMethods
 */
class Method extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function markerMethods()
    {
        return $this->hasMany('App\Models\Marker\MarkerMethod');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function methodLanguage()
    {
        return $this->HasMany('App\Models\MethodLanguage');
    }

    public function methodRu()
    {
        return $this->hasOne(MethodLanguage::class)
            ->where('language', 'ru');
    }
    public function methodEng()
    {
        return $this->hasOne(MethodLanguage::class)
            ->where('language', 'eng');
    }
}
