<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Question
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $is_active
 * @property-read \App\Models\QuestionLanguage $questEng
 * @property-read \App\Models\QuestionLanguage $questRu
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Question whereIsActive($value)
 * @mixin \Eloquent
 */
class Question extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];

    public function questRu()
    {
        return $this->hasOne(QuestionLanguage::class)
            ->where('language', 'ru');
    }
    public function questEng()
    {
        return $this->hasOne(QuestionLanguage::class)
            ->where('language', 'eng');
    }

}
