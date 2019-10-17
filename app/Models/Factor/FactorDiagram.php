<?php

namespace App\Models\Factor;

use App\Models\Organ;
use App\Models\TypesLanguage;
use Illuminate\Database\Eloquent\Model;

class FactorDiagram extends Model
{
    protected $table = 'factors';

    public function organ()
    {
        return $this->belongsToMany(Organ::class, 'factor_organs', 'factor_id', 'organ_id');
    }

    public function factorLanguage()
    {
        return $this->hasOne('App\Models\Factor\FactorLanguage', 'factor_id');
    }

    public function factorRu()
    {
        return $this->hasOne(FactorLanguage::class, 'factor_id')
            ->where('language', 'ru');
    }

    public function factorEng()
    {
        return $this->hasOne(FactorLanguage::class, 'factor_id')
            ->where('language', 'eng');
    }

    public function protocols()
    {
        return $this->belongsToMany('App\Models\Protocol\Protocol', 'factor_protocols', 'factor_id');
    }

    public function markers()
    {
        return $this->belongsToMany('App\Models\Marker\Marker', 'factor_markers', 'factor_id');
    }

    public function typeRu()
    {
        return $this->hasOne(TypesLanguage::class, 'type_id', 'type_id')
            ->where('language', 'ru');
    }

    public function typeEng()
    {
        return $this->hasOne(TypesLanguage::class, 'type_id', 'type_id')
            ->where('language', 'eng');
    }
}
