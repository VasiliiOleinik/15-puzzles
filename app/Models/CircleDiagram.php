<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CircleDiagram extends Model
{
    protected $guarded = [];

    public function circleLang()
    {
        return $this->hasOne(CircleLangDiagram::class, 'circle_diagram_name', 'name');
    }

    public function circleRu()
    {
        return $this->hasOne(CircleLangDiagram::class, 'circle_diagram_name', 'name')
            ->where('language', 'ru');
    }

    public function circleEng()
    {
        return $this->hasOne(CircleLangDiagram::class, 'circle_diagram_name', 'name')
            ->where('language', 'eng');
    }

    public function defaultImage()
    {
        return $this->hasOne(self::class, 'name', 'name')
            ->where('status', 'default');
    }

    public function colorImage()
    {
        return $this->hasOne(self::class, 'name', 'name')
            ->where('status', 'color');
    }

}
