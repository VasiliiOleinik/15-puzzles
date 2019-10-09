<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function langRu()
    {
        return $this->where('lang', 'ru');
    }

    public function langEng()
    {

    }
}
