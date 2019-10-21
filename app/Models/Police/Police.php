<?php

namespace App\Models\Police;

use Illuminate\Database\Eloquent\Model;

class Police extends Model
{
    protected $table = 'police';

    public function policeRu()
    {
        return $this->hasOne(PoliceLanguage::class, 'police_id')
            ->where('language', 'ru');
    }

    public function policeEng()
    {
        return $this->hasOne(PoliceLanguage::class, 'police_id')
            ->where('language', 'eng');
    }

    public function policeLang()
    {
        return $this->hasOne(PoliceLanguage::class, 'police_id');
    }

    public function scopeSetLocaleRu($query)
    {
        return $query->where('language', 'ru');
    }
}
