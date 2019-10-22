<?php

namespace App\Models;

use App\Models\Laboratory\Laboratory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Method
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property MarkerMethod[] $markerMethods
 * @property int $is_active
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read int|null $marker_methods_count
 * @property-read \App\Models\MethodLanguage $methodEng
 * @property-read \App\Models\MethodLanguage $methodLang
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MethodLanguage[] $methodLanguage
 * @property-read int|null $method_language_count
 * @property-read \App\Models\MethodLanguage $methodRu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Method newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Method newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Method query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Method whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Method whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Method whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Method whereUpdatedAt($value)
 * @mixin \Eloquent
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

    public function methodLang()
    {
        return $this->hasOne('App\Models\MethodLanguage');
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

    public function laboratories()
    {
        return $this->belongsToMany(Laboratory::class, 'laboratory_methods');
    }

}
