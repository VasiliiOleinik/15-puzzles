<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NameCols extends Model
{
    protected $guarded = [];

    public function colsRu()
    {
        return $this->hasOne(NameLanguageCols::class, 'cols_id')
            ->where('language', 'ru');
    }

    public function colsEng()
    {
        return $this->hasOne(NameLanguageCols::class, 'cols_id')
            ->where('language', 'eng');
    }

    public function langCols()
    {
        return $this->hasOne(NameLanguageCols::class, 'cols_id');
    }
}
