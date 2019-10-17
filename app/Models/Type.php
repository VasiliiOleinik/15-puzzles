<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $abnormal_condition
 * @property string $normal_condition
 * @property Factor[] $factors
 */
class Type extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factors()
    {
        return $this->hasMany('App\Models\Factor\Factor', 'type_id', 'id');
    }

    public function typesLang()
    {
        return $this->hasMany(TypesLanguage::class)
            ->where('language', 'ru');
    }

    public function typesLangRu()
    {
        return $this->hasOne(TypesLanguage::class)
            ->where('language', 'eng');
    }
}
